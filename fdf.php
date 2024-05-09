<?php

declare(strict_types=1);

namespace Api\Integration\Elastic\V2;

use Codeception\Allure\AllureLogger;
use Codeception\Example;
use Contracts\Elastic\ProductsContract;
use Contracts\Extlab\BookProductContract;
use Contracts\Extlab\ClearBookingContract;
use Exception;
use Contracts\Extlab\InventoryUpdateById\InventoryProductDataContract;
use Contracts\Extlab\InventoryUpdateById\UpdateInventoryByIdV3Contract;
use Yandex\Allure\Adapter\Annotation\{Description, Epics, Features, Issues, Stories, Title};
use TestData\{Extlab\LaboratoryData, Store};
use Helper\Authorization\AuthorizationHelper;
use Helper\DataBase\DataBaseHelper;
use Helper\DataBase\DataBaseSetting;
use Helper\ExtLab\DbExtlabHelper;
use Helper\Validator\ValidatorHelper;
use Hooks\CustomHooks;
use Tester\Elastic\Product\ProductTester;
use Tester\ExtLab\Inventory\InventoryTester;
use Yandex\Allure\Adapter\AllureException;

final class ProductsV2CheckStockCest
{
    use CustomHooks;

    private const ITEM_ID_BOOKING_SHAMIR = 20000;

    private const ITEM_ID_BOOKING_FLORIDA = 20001;

    private const PRODUCTS_SKU = array(
        'productSku' => '35-002870',
        'productOnSaleSku' => '44-M3648',
        'productBookingSku' => '46-005192',
    );

    private const PRODUCT = '66599';

    private const PRODUCT_ON_SALE = '4265';

    private const PRODUCT_BOOKING = '70295';

    private const BOOKING_QTY = 7;

    private const BOOKING_STATUS_TRUE = 1;

    private const INVENTORY_STATUS_TRUE = 1;

    private const TABLE_CORE_STORE = 'core_store';

    private const WEBSITE_ID = 'website_id';

    private ValidatorHelper $validatorHelper;

    private AuthorizationHelper $authorizationHelper;

    private InventoryTester $inventoryTester;

    private DataBaseHelper $dataBaseHelper;

    private ProductTester $productTester;

    public function _injectDependencies(
        AuthorizationHelper $authorizationHelper,
        ValidatorHelper $validatorHelper,
        InventoryTester $inventoryTester,
        DataBaseHelper $dataBaseHelper,
        ProductTester $productTester,
    ): void {
        $this->authorizationHelper = $authorizationHelper;
        $this->validatorHelper = $validatorHelper;
        $this->inventoryTester = $inventoryTester;
        $this->dataBaseHelper = $dataBaseHelper;
        $this->productTester = $productTester;
    }

    /**
     * @throws AllureException
     * @throws Exception
     */
    public function _globalBefore(): void
    {
        $this->deleteBookingsForShamirAndFlorida();
        $this->updateInventory();
    }

    /**
     *
     * @group product_discovery
     * @group elastic
     *
     * @Title ("Checking the stock on the product.")
     * @Description ("Сhecking the product stock on the Elastic endpoint. Endpoint: {/v2/$storeId/products}")
     * @Issues ("https://optimaxdev.atlassian.net/browse/BQA-1530")
     * @Epics ("Integration test - Elastic")
     * @Features ("Elastic")
     * @Stories ("Check stock")
     *
     * @dataProvider storeIdDataProvider
     * @throws AllureException
     */
    public function testCheckQuantityProductStock(Example $provider): void
    {
        $product = $this->productTester->getProductsInElasticV2(
            storeId: $provider['storeId'],
            contract: new ProductsContract(
                ids: self::PRODUCT,
            )
        );

        $productStock = $product->getItems()[0]->getChildren()[0]->getStock();
        $retailStock = $product->getItems()[0]->getChildren()[0]->getRetailStock();

        $totalStock = $this->getStockDataByStoreIdAndProductSku($provider['storeId'], self::PRODUCTS_SKU['productSku']);

        $this->validatorHelper->assertEquals($totalStock[0]['totalStock'], $productStock->getQty());

        $this->validatorHelper->assertEquals($totalStock[0]['totalRetailStock'], $retailStock->getQty());
    }

    private function storeIdDataProvider(): iterable
    {
        yield [
            'storeId' => Store::FLORIDA_MAIL_ID,
        ];

        yield [
            'storeId' => Store::ROOSEVELT_FIELD_ID,
        ];

        yield [
            'storeId' => Store::GLASSESUSA_DESKTOP_ID,
        ];
    }

    /**
     *
     * @group product_discovery
     * @group elastic
     *
     * @Title ("Checking the stock on the product by not on sale.")
     * @Description ("Checking the stock on the product by not on sale Elastic endpoint.
     * Endpoint: {/v2/$storeId/products}")
     * @Issues ("https://optimaxdev.atlassian.net/browse/BQA-1530")
     * @Epics ("Integration test - Elastic")
     * @Features ("Elastic")
     * @Stories ("Check stock")
     *
     * @throws AllureException
     */
    public function testCheckQuantityProductStockOnSale(): void
    {
        $product = $this->productTester->getProductsInElasticV2(
            storeId: Store::GLASSESUSA_DESKTOP_ID,
            contract: new ProductsContract(
                ids: self::PRODUCT_ON_SALE,
            )
        );

        $productRetail = $this->productTester->getProductsInElasticV2(
            storeId: Store::FLORIDA_MAIL_ID,
            contract: new ProductsContract(
                ids: self::PRODUCT_ON_SALE
            )
        );

        $productStock = $product->getItems()[0]->getChildren()[0]->getStock();
        $productRetailStock = $productRetail->getItems()[0]->getChildren()[0]->getRetailStock();

        $totalStock = $this->getStockDataByStoreIdAndProductSku(
            storeId: Store::GLASSESUSA_DESKTOP_ID,
            productSku: self::PRODUCTS_SKU['productOnSaleSku']
        );

        $totalRetailStock = $this->getStockDataByStoreIdAndProductSku(
            storeId: Store::FLORIDA_MAIL_ID,
            productSku: self::PRODUCTS_SKU['productOnSaleSku']
        );

        $this->validatorHelper->assertEquals($totalStock[0]['totalStock'], $productStock->getQty());

        $this->validatorHelper->assertEquals($totalRetailStock[0]['totalRetailStock'], $productRetailStock->getQty());
    }

    /**
     *
     * @group product_discovery
     * @group elastic
     *
     * @Title ("Checking the stock on the product booking.")
     * @Description ("Сhecking the product booking stock on the Elastic endpoint.
     * Endpoint: {/v2/$storeId/products}")
     * @Issues ("https://optimaxdev.atlassian.net/browse/BQA-1530")
     * @Epics ("Integration test - Elastic")
     * @Features ("Elastic")
     * @Stories ("Check stock")
     *
     * @throws AllureException
     *
     * @before addBookingsForShamirAndFlorida
     */
    public function testCheckQuantityProductStockByBooking(): void
    {
        $product = $this->productTester->getProductsInElasticV2(
            storeId: Store::GLASSESUSA_DESKTOP_ID,
            contract: new ProductsContract(
                ids: self::PRODUCT_BOOKING
            )
        );

        $productRetail = $this->productTester->getProductsInElasticV2(
            storeId: Store::FLORIDA_MAIL_ID,
            contract: new ProductsContract(
                ids: self::PRODUCT_BOOKING
            )
        );

        $productStock = $product->getItems()[0]->getChildren()[0]->getStock();
        $productRetailStock = $productRetail->getItems()[0]->getChildren()[0]->getRetailStock();

        $totalStock = $this->getStockDataByStoreIdAndProductSku(
            storeId: Store::GLASSESUSA_DESKTOP_ID,
            productSku: self::PRODUCTS_SKU['productBookingSku']
        );

        $totalRetailStock = $this->getStockDataByStoreIdAndProductSku(
            storeId: Store::FLORIDA_MAIL_ID,
            productSku: self::PRODUCTS_SKU['productBookingSku']
        );

        $this->validatorHelper->assertEquals($totalStock[0]['totalStock'], $productStock->getQty());

        $this->validatorHelper->assertEquals($totalRetailStock[0]['totalRetailStock'], $productRetailStock->getQty());
    }

    /**
     * @throws Exception
     */
    private function updateInventory(): void
    {
        AllureLogger::startStep('Inventory update by extlab laboratories Shamir and Florida and Roosvelt');
        try {
            $this->authorizationHelper->setAuthorizationAsMagento();
            $dataArray = $this->getInventoryDetailsFromDatabase();

            foreach ($dataArray as $item) {
                $id = (int)$item['id'];
                $onSale =
                    !($item['product_sku'] == self::PRODUCTS_SKU['productOnSaleSku']
                        && in_array(
                            $item['laboratory_id'],
                            [LaboratoryData::EXTLAB_ID_SHAMIR, LaboratoryData::EXTLAB_ID_FLORIDA]
                        ));
                $contract = new UpdateInventoryByIdV3Contract(
                    productSku: $item['product_sku'],
                    stock: 10,
                    onSale: $onSale,
                    weight: 10,
                    productData: (new InventoryProductDataContract(nextDayShippingAvailable: false))
                );
                $this->inventoryTester->updateInventoryById(id: $id, contract: $contract);
            }
        } catch (Exception $e) {
            AllureLogger::failStep();
            throw $e;
        }
    }

    /**
     * @throws AllureException
     */
    private function deleteBookingsForShamirAndFlorida(): void
    {
        AllureLogger::startStep('Remove reservations at the request laboratories Shamir and Florida');
        try {
            $contractShamirBooking = $this->getContractDeleteBooking(
                itemId: self::ITEM_ID_BOOKING_SHAMIR,
                laboratoryId: (string)LaboratoryData::EXTLAB_ID_FLORIDA
            );
            $this->inventoryTester->clearBookProduct([$contractShamirBooking]);
            $contractFloridaBooking = $this->getContractDeleteBooking(
                itemId: self::ITEM_ID_BOOKING_FLORIDA,
                laboratoryId: (string)LaboratoryData::EXTLAB_ID_FLORIDA
            );
            $this->inventoryTester->clearBookProduct([$contractFloridaBooking]);
        } catch (Exception $e) {
            AllureLogger::failStep();
            throw $e;
        }
    }

    private function getContractDeleteBooking(int $itemId, string $laboratoryId): ClearBookingContract
    {
        return new ClearBookingContract(
            itemId: $itemId,
            productSku:self::PRODUCTS_SKU['productBookingSku'],
            laboratoryId: (int)$laboratoryId,
            qty: self::BOOKING_QTY,
            time: date("Y-m-d H:i:s"),
            state: self::BOOKING_STATUS_TRUE,
        );
    }

    /**
     * @throws AllureException
     */
    private function addBookingsForShamirAndFlorida(): void
    {
        AllureLogger::startStep('Add booking at the request laboratories Shamir and Florida');
        try {
            $contractFloridaBooking = $this->getContractCreateBooking(
                itemId: self::ITEM_ID_BOOKING_FLORIDA,
                laboratoryId: (string)LaboratoryData::EXTLAB_ID_FLORIDA
            );

            $contractShamirBooking = $this->getContractCreateBooking(
                itemId: self::ITEM_ID_BOOKING_SHAMIR,
                laboratoryId: (string)LaboratoryData::EXTLAB_ID_SHAMIR
            );
            $this->inventoryTester->addBookForceProduct([$contractShamirBooking]);
            $this->inventoryTester->addBookForceProduct([$contractFloridaBooking]);
        } catch (Exception $e) {
            AllureLogger::failStep();
            throw $e;
        }
    }

    private function getContractCreateBooking(int $itemId, string $laboratoryId): BookProductContract
    {
        return new BookProductContract(
            productSku: self::PRODUCTS_SKU['productBookingSku'],
            quantity: self::BOOKING_QTY,
            itemId: $itemId,
            laboratoryId: (int)$laboratoryId,
            state: true
        );
    }

    /**
     * @throws AllureException
     */
    private function getStockDataByStoreIdAndProductSku(int $storeId, string $productSku): array
    {
        AllureLogger::startStep("Take the stock by $storeId and '$productSku' from database");
        try {
            $websiteId = $this->dataBaseHelper->grabValue(
                dbName: DataBaseSetting::DEV_MASTER_DB_NAME,
                table: self::TABLE_CORE_STORE,
                columns: self::WEBSITE_ID,
                criteria: ['store_id' => $storeId]
            );

            $query = sprintf(
                'SELECT SUM(subquery.stock) AS totalStock, SUM(subquery.retailStock) AS totalRetailStock
                    FROM (
                        SELECT 
                            (SUM(%1$s) - COALESCE(SUM(%2$s.quantity), 0)) AS stock,
                            (CASE WHEN %3$s.id IN (%9$d, %10$d) THEN SUM(%1$s) - 
                            COALESCE(SUM(%2$s.quantity), 0) ELSE 0 END) AS retailStock
                        FROM 
                            %3$s
                        LEFT JOIN 
                            %4$s ON %4$s.laboratory_id = %3$s.id
                        LEFT JOIN 
                            %2$s ON %4$s.product_sku = %2$s.product_sku AND %3$s.id = %2$s.laboratory_id
                        WHERE 
                            %4$s.product_sku = "%5$s" 
                            AND %6$s = %7$d 
                            AND JSON_CONTAINS(%3$s.website_ids, "%8$s")
                        GROUP BY
                            %3$s.id
                    ) AS subquery',
                DbExtlabHelper::COLUMN_INVENTORY_STOCK,
                DbExtlabHelper::TABLE_BOOKING,
                DbExtlabHelper::TABLE_LABORATORY,
                DbExtlabHelper::TABLE_INVENTORY,
                "$productSku",
                DbExtlabHelper::COLUMN_INVENTORY_ON_SALE,
                self::INVENTORY_STATUS_TRUE,
                "$websiteId",
                LaboratoryData::EXTLAB_ID_ROOSVELT,
                LaboratoryData::EXTLAB_ID_FLORIDA
            );

            $result = $this->dataBaseHelper->executeRawQuery(
                DataBaseSetting::EXTLAB_DB_NAME,
                $query,
            );

            AllureLogger::finishStep();
            return $result;
        } catch (Exception $e) {
            AllureLogger::failStep();
            throw $e;
        }
    }

    /**
     * @throws AllureException
     */
    private function getInventoryDetailsFromDatabase(): array
    {
        AllureLogger::startStep('Get inventory id, sku and laboratories');
        try {
            $query = sprintf(
                'SELECT `%1$s`, `%2$s`, `%3$s` FROM `%4$s` WHERE (`%3$s` IN (%5$d, %6$d, %7$d) AND `%2$s` IN (%8$s))',
                DbExtlabHelper::COLUMN_INVENTORY_ID,
                DbExtlabHelper::COLUMN_INVENTORY_SKU,
                DbExtlabHelper::COLUMN_INVENTORY_LABORATORY_ID,
                DbExtlabHelper::TABLE_INVENTORY,
                LaboratoryData::EXTLAB_ID_SHAMIR,
                LaboratoryData::EXTLAB_ID_ROOSVELT,
                LaboratoryData::EXTLAB_ID_FLORIDA,
                implode(', ', array_map(fn($sku) => "'$sku'", array_values(self::PRODUCTS_SKU)))
            );

            $result = $this->dataBaseHelper->executeRawQuery(
                DataBaseSetting::EXTLAB_DB_NAME,
                $query,
            );

            AllureLogger::finishStep();
            return $result;
        } catch (Exception $e) {
            AllureLogger::failStep();
            throw $e;
        }
    }
}
