<?php
//
//class Operator
//{
//    public function make(Builder1 $builder): Message
//    {
//		$builder->makeHeader();
//        $builder->makeBody();
//        $builder->makeFooter();
//        $builder->makeCustom();
//        return $builder->getText();
//    }
//}
//
//interface Builder1
//{
//    public function makeHeader();
//    public function makeBody();
//    public function makeFooter();
//    public function makeCustom();
//
//    public function getText();
//}
//
//class TextBuilder implements Builder1
//{
//    private Message $message;
//
//    public function make(): void
//    {
//        $this->message = new Message();
//    }
//    public function makeHeader()
//    {
//        $this->message->setPart(new Header('Header Text'));
//    }
//
//    public function makeBody()
//    {
//        $this->message->setPart(new Body('Body Text'));
//    }
//
//    public function makeFooter()
//    {
//        $this->message->setPart(new Footer('Footer Text'));
//    }
//
//    public function makeCustom()
//    {
//        $this->message->setPart(new Custom('Custom Text'));
//    }
//
//    public function getText()
//    {
//        return $this->message;
//    }
//}
//
//
//class Section
//{
//    private string $text;
//
//    /**
//     * @param  string  $text
//     */
//    public function __construct(string $text)
//    {
//        $this->text = $text;
//    }
//
//    public function __toString(): string
//    {
//        return $this->text;
//    }
//}
//
//class Header extends Section
//{
//
//}
//
//class Body extends Section
//{
//
//}
//
//class Footer extends Section
//{
//
//}
//
//class Custom extends Section
//{
//
//}
//
//class Message
//{
//    private string $text = '';
//
//    public function setPart($part)
//    {
//        $this->text .= $part . PHP_EOL;
//    }
//
//    public function getText(): string
//    {
//        return  $this->text;
//    }
//}
//
//$operator = new Operator();
//
//$builder = new TextBuilder();
//$builder->make();
//
//$message = $operator->make($builder);
//
//var_dump($message->getText());
//
////примеры от refactoring.guru.
//
///**
// * Интерфейс Строителя объявляет создающие методы для различных частей объектов
// * Продуктов.
// */
//interface Builder
//{
//    public function producePartA(): void;
//
//    public function producePartB(): void;
//
//    public function producePartC(): void;
//}
//
///**
// * Классы Конкретного Строителя следуют интерфейсу Строителя и предоставляют
// * конкретные реализации шагов построения. Ваша программа может иметь несколько
// * вариантов Строителей, реализованных по-разному.
// */
//class ConcreteBuilder1 implements Builder
//{
//    private $product;
//
//    /**
//     * Новый экземпляр строителя должен содержать пустой объект продукта,
//     * который используется в дальнейшей сборке.
//     */
//    public function __construct()
//    {
//        $this->reset();
//    }
//
//    public function reset(): void
//    {
//        $this->product = new Product1();
//    }
//
//    /**
//     * Все этапы производства работают с одним и тем же экземпляром продукта.
//     */
//    public function producePartA(): void
//    {
//        $this->product->parts[] = "PartA1";
//    }
//
//    public function producePartB(): void
//    {
//        $this->product->parts[] = "PartB1";
//    }
//
//    public function producePartC(): void
//    {
//        $this->product->parts[] = "PartC1";
//    }
//
//    /**
//     * Конкретные Строители должны предоставить свои собственные методы
//     * получения результатов. Это связано с тем, что различные типы строителей
//     * могут создавать совершенно разные продукты с разными интерфейсами.
//     * Поэтому такие методы не могут быть объявлены в базовом интерфейсе
//     * Строителя (по крайней мере, в статически типизированном языке
//     * программирования). Обратите внимание, что PHP является динамически
//     * типизированным языком, и этот метод может быть в базовом интерфейсе.
//     * Однако мы не будем объявлять его здесь для ясности.
//     *
//     * Как правило, после возвращения конечного результата клиенту, экземпляр
//     * строителя должен быть готов к началу производства следующего продукта.
//     * Поэтому обычной практикой является вызов метода сброса в конце тела
//     * метода getProduct. Однако такое поведение не является обязательным, вы
//     * можете заставить своих строителей ждать явного запроса на сброс из кода
//     * клиента, прежде чем избавиться от предыдущего результата.
//     */
//    public function getProduct(): Product1
//    {
//        $result = $this->product;
//        $this->reset();
//
//        return $result;
//    }
//}
//
///**
// * Имеет смысл использовать паттерн Строитель только тогда, когда ваши продукты
// * достаточно сложны и требуют обширной конфигурации.
// *
// * В отличие от других порождающих паттернов, различные конкретные строители
// * могут производить несвязанные продукты. Другими словами, результаты различных
// * строителей могут не всегда следовать одному и тому же интерфейсу.
// */
//class Product1
//{
//    public $parts = [];
//
//    public function listParts(): void
//    {
//        echo "Product parts: ".implode(', ', $this->parts)."\n\n";
//    }
//}
//
///**
// * Директор отвечает только за выполнение шагов построения в определённой
// * последовательности. Это полезно при производстве продуктов в определённом
// * порядке или особой конфигурации. Строго говоря, класс Директор необязателен,
// * так как клиент может напрямую управлять строителями.
// */
//class Director
//{
//    /**
//     * @var Builder
//     */
//    private $builder;
//
//    /**
//     * Директор работает с любым экземпляром строителя, который передаётся ему
//     * клиентским кодом. Таким образом, клиентский код может изменить конечный
//     * тип вновь собираемого продукта.
//     */
//    public function setBuilder(Builder $builder): void
//    {
//        $this->builder = $builder;
//    }
//
//    /**
//     * Директор может строить несколько вариаций продукта, используя одинаковые
//     * шаги построения.
//     */
//    public function buildMinimalViableProduct(): void
//    {
//        $this->builder->producePartA();
//    }
//
//    public function buildFullFeaturedProduct(): void
//    {
//        $this->builder->producePartA();
//        $this->builder->producePartB();
//        $this->builder->producePartC();
//    }
//}
//
///**
// * Клиентский код создаёт объект-строитель, передаёт его директору, а затем
// * инициирует процесс построения. Конечный результат извлекается из объекта-
// * строителя.
// */
//function clientCode(Director $director)
//{
//    $builder = new ConcreteBuilder1();
//    $director->setBuilder($builder);
//
//    echo "Standard basic product:\n";
//    $director->buildMinimalViableProduct();
//    $builder->getProduct()->listParts();
//
//    echo "Standard full featured product:\n";
//    $director->buildFullFeaturedProduct();
//    $builder->getProduct()->listParts();
//
//    // Помните, что паттерн Строитель можно использовать без класса Директор.
//    echo "Custom product:\n";
//    $builder->producePartA();
//    $builder->producePartC();
//    $builder->getProduct()->listParts();
//}
//
//$director = new Director();
//clientCode($director);
//
//
////примеры из жизни от refactoring.guru - Пример из реальной жизни
//
//
///**
// * Интерфейс Строителя объявляет набор методов для сборки SQL-запроса.
// *
// * Все шаги построения возвращают текущий объект строителя, чтобы обеспечить
// * цепочку: $builder->select(...)->where(...)
// */
//interface SQLQueryBuilder
//{
//    public function select(string $table, array $fields): SQLQueryBuilder;
//
//    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;
//
//    public function limit(int $start, int $offset): SQLQueryBuilder;
//
//    // +100 других методов синтаксиса SQL...
//
//    public function getSQL(): string;
//}
//
///**
// * Каждый Конкретный Строитель соответствует определённому диалекту SQL и может
// * реализовать шаги построения немного иначе, чем остальные.
// *
// * Этот Конкретный Строитель может создавать SQL-запросы, совместимые с MySQL.
// */
//class MysqlQueryBuilder implements SQLQueryBuilder
//{
//    protected $query;
//
//    protected function reset(): void
//    {
//        $this->query = new \stdClass();
//    }
//
//    /**
//     * Построение базового запроса SELECT.
//     */
//    public function select(string $table, array $fields): SQLQueryBuilder
//    {
//        $this->reset();
//        $this->query->base = "SELECT ".implode(", ", $fields)." FROM ".$table;
//        $this->query->type = 'select';
//
//        return $this;
//    }
//
//    /**
//     * Добавление условия WHERE.
//     */
//    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
//    {
//        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
//            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
//        }
//        $this->query->where[] = "$field $operator '$value'";
//
//        return $this;
//    }
//
//    /**
//     * Добавление ограничения LIMIT.
//     */
//    public function limit(int $start, int $offset): SQLQueryBuilder
//    {
//        if (!in_array($this->query->type, ['select'])) {
//            throw new \Exception("LIMIT can only be added to SELECT");
//        }
//        $this->query->limit = " LIMIT ".$start.", ".$offset;
//
//        return $this;
//    }
//
//    /**
//     * Получение окончательной строки запроса.
//     */
//    public function getSQL(): string
//    {
//        $query = $this->query;
//        $sql = $query->base;
//        if (!empty($query->where)) {
//            $sql .= " WHERE ".implode(' AND ', $query->where);
//        }
//        if (isset($query->limit)) {
//            $sql .= $query->limit;
//        }
//        $sql .= ";";
//        return $sql;
//    }
//}
//
///**
// * Этот Конкретный Строитель совместим с PostgreSQL. Хотя Postgres очень похож
// * на Mysql, в нем всё же есть ряд отличий. Чтобы повторно использовать общий
// * код, мы расширяем его от строителя MySQL, переопределяя некоторые шаги
// * построения.
// */
//class PostgresQueryBuilder extends MysqlQueryBuilder
//{
//    /**
//     * Помимо прочего, PostgreSQL имеет несколько иной синтаксис LIMIT.
//     */
//    public function limit(int $start, int $offset): SQLQueryBuilder
//    {
//        parent::limit($start, $offset);
//
//        $this->query->limit = " LIMIT ".$start." OFFSET ".$offset;
//
//        return $this;
//    }
//
//    // + тонны других переопределений...
//}
//
//
///**
// * Обратите внимание, что клиентский код непосредственно использует объект
// * строителя. Назначенный класс Директора в этом случае не нужен, потому что
// * клиентский код практически всегда нуждается в различных запросах, поэтому
// * последовательность шагов конструирования непросто повторно использовать.
// *
// * Поскольку все наши строители запросов создают продукты одного типа (это
// * строка), мы можем взаимодействовать со всеми строителями, используя их общий
// * интерфейс. Позднее, если мы реализуем новый класс Строителя, мы сможем
// * передать его экземпляр существующему клиентскому коду, не нарушая его,
// * благодаря интерфейсу SQLQueryBuilder.
// */
//function clientCode1(SQLQueryBuilder $queryBuilder)
//{
//    // ...
//
//    $query = $queryBuilder
//        ->select("users", ["name", "email", "password"])
//        ->where("age", 18, ">")
//        ->where("age", 30, "<")
//        ->limit(10, 20)
//        ->getSQL();
//
//    echo $query;
//    // ...
//}
//
//
///**
// * Приложение выбирает подходящий тип строителя запроса в зависимости от текущей
// * конфигурации или настроек среды.
// */
//// if ($_ENV['database_type'] == 'postgres') {
////     $builder = new PostgresQueryBuilder(); } else {
////     $builder = new MysqlQueryBuilder(); }
////
//// clientCode($builder);
//
//
//echo "Testing MySQL query builder:\n";
//clientCode1(new MysqlQueryBuilder());
//
//echo "\n\n";
//
//echo "Testing PostgresSQL query builder:\n";
//clientCode1(new PostgresQueryBuilder());