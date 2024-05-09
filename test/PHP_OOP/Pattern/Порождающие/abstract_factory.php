<?php
//
//interface AbstractFactory1
//{
//    public static function makeDeveloperWorker(): DeveloperWorker;
//
//    public static function makeDesignerWorker(): DesignerWorker;
//}
//
//interface Worker
//{
//    public function work();
//}
//
//interface DeveloperWorker extends Worker
//{
//
//}
//
//interface DesignerWorker extends Worker
//{
//
//}
//
//class OutsourceWorkerFactory implements AbstractFactory1
//{
//
//    public static function makeDeveloperWorker(): DeveloperWorker
//    {
//        return new OutsourceDeveloperWorker();
//    }
//
//    public static function makeDesignerWorker(): DesignerWorker
//    {
//        return new OutsourceDesignerWorker();
//    }
//}
//
//class NativeWorkerFactory implements AbstractFactory1
//{
//
//    public static function makeDeveloperWorker(): DeveloperWorker
//    {
//        return new NativeDeveloperWorker();
//    }
//
//    public static function makeDesignerWorker(): DesignerWorker
//    {
//        return new NativeDesignerWorker();
//    }
//}
//
//class NativeDeveloperWorker implements DeveloperWorker
//{
//    public function work(): void
//    {
//        printf("im developing a new native application");
//    }
//}
//
//class OutsourceDeveloperWorker implements DeveloperWorker
//{
//    public function work(): void
//    {
//        printf("im developing a new outsource application");
//    }
//}
//
//class NativeDesignerWorker implements DesignerWorker
//{
//    public function work(): void
//    {
//        printf("im designer a new native application");
//    }
//}
//
//class OutsourceDesignerWorker implements DesignerWorker
//{
//    public function work(): void
//    {
//        printf("im designer a new outsource application");
//    }
//}
//
//$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
//$outsourceDeveloper = OutsourceWorkerFactory::makeDeveloperWorker();
//$nativeDesigner = NativeWorkerFactory::makeDesignerWorker();
//$outsourceDesigner = NativeWorkerFactory::makeDesignerWorker();
//
//$outsourceDesigner->work();
//echo "\n";
//
////пример от refactoring.guru
//
//
///**
// * Интерфейс Абстрактной Фабрики объявляет набор методов, которые возвращают
// * различные абстрактные продукты. Эти продукты называются семейством и связаны
// * темой или концепцией высокого уровня. Продукты одного семейства обычно могут
// * взаимодействовать между собой. Семейство продуктов может иметь несколько
// * вариаций, но продукты одной вариации несовместимы с продуктами другой.
// */
//interface AbstractFactory
//{
//    public function createProductA(): AbstractProductA;
//
//    public function createProductB(): AbstractProductB;
//}
//
///**
// * Конкретная Фабрика производит семейство продуктов одной вариации. Фабрика
// * гарантирует совместимость полученных продуктов. Обратите внимание, что
// * сигнатуры методов Конкретной Фабрики возвращают абстрактный продукт, в то
// * время как внутри метода создается экземпляр конкретного продукта.
// */
//class ConcreteFactory1 implements AbstractFactory
//{
//    public function createProductA(): AbstractProductA
//    {
//        return new ConcreteProductA1();
//    }
//
//    public function createProductB(): AbstractProductB
//    {
//        return new ConcreteProductB1();
//    }
//}
//
///**
// * Каждая Конкретная Фабрика имеет соответствующую вариацию продукта.
// */
//class ConcreteFactory2 implements AbstractFactory
//{
//    public function createProductA(): AbstractProductA
//    {
//        return new ConcreteProductA2();
//    }
//
//    public function createProductB(): AbstractProductB
//    {
//        return new ConcreteProductB2();
//    }
//}
//
///**
// * Каждый отдельный продукт семейства продуктов должен иметь базовый интерфейс.
// * Все вариации продукта должны реализовывать этот интерфейс.
// */
//interface AbstractProductA
//{
//    public function usefulFunctionA(): string;
//}
//
///**
// * Конкретные продукты создаются соответствующими Конкретными Фабриками.
// */
//class ConcreteProductA1 implements AbstractProductA
//{
//    public function usefulFunctionA(): string
//    {
//        return "The result of the product A1.";
//    }
//}
//
//class ConcreteProductA2 implements AbstractProductA
//{
//    public function usefulFunctionA(): string
//    {
//        return "The result of the product A2.";
//    }
//}
//
///**
// * Базовый интерфейс другого продукта. Все продукты могут взаимодействовать друг
// * с другом, но правильное взаимодействие возможно только между продуктами одной
// * и той же конкретной вариации.
// */
//interface AbstractProductB
//{
//    /**
//     * Продукт B способен работать самостоятельно...
//     */
//    public function usefulFunctionB(): string;
//
//    /**
//     * ...а также взаимодействовать с Продуктами A той же вариации.
//     *
//     * Абстрактная Фабрика гарантирует, что все продукты, которые она создает,
//     * имеют одинаковую вариацию и, следовательно, совместимы.
//     */
//    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string;
//}
//
///**
// * Конкретные Продукты создаются соответствующими Конкретными Фабриками.
// */
//class ConcreteProductB1 implements AbstractProductB
//{
//    public function usefulFunctionB(): string
//    {
//        return "The result of the product B1.";
//    }
//
//    /**
//     * Продукт B1 может корректно работать только с Продуктом A1. Тем не менее,
//     * он принимает любой экземпляр Абстрактного Продукта А в качестве
//     * аргумента.
//     */
//    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string
//    {
//        $result = $collaborator->usefulFunctionA();
//
//        return "The result of the B1 collaborating with the ({$result})";
//    }
//}
//
//class ConcreteProductB2 implements AbstractProductB
//{
//    public function usefulFunctionB(): string
//    {
//        return "The result of the product B2.";
//    }
//
//    /**
//     * Продукт B2 может корректно работать только с Продуктом A2. Тем не менее,
//     * он принимает любой экземпляр Абстрактного Продукта А в качестве
//     * аргумента.
//     */
//    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string
//    {
//        $result = $collaborator->usefulFunctionA();
//
//        return "The result of the B2 collaborating with the ({$result})";
//    }
//}
//
///**
// * Клиентский код работает с фабриками и продуктами только через абстрактные
// * типы: Абстрактная Фабрика и Абстрактный Продукт. Это позволяет передавать
// * любой подкласс фабрики или продукта клиентскому коду, не нарушая его.
// */
//function clientCode(AbstractFactory $factory)
//{
//    $productA = $factory->createProductA();
//    $productB = $factory->createProductB();
//
//    echo $productB->usefulFunctionB()."\n";
//    echo $productB->anotherUsefulFunctionB($productA)."\n";
//}
//
///**
// * Клиентский код может работать с любым конкретным классом фабрики.
// */
//echo "Client: Testing client code with the first factory type:\n";
//clientCode(new ConcreteFactory1());
//
//echo "\n";
//
//echo "Client: Testing the same client code with the second factory type:\n";
//clientCode(new ConcreteFactory2());
//
//
//// TODO: когда нужно использовать множество вариаций выбора чего либо
