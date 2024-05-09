<?php
//
//class Worker
//{
//    private string $name;
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public function setName(string $name): void
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public function __construct(string $name)
//    {
//        $this->name = $name;
//    }
//
//}
//
//
//class WorkerFactory
//{
//    public static function make(): Worker
//    {
//        return new Worker('name');
//    }
//}
//
//class WorkerDoubleFactory
//{
//    public static function make(): Worker
//    {
//        return new Worker('name');
//    }
//}
//
//$worker = WorkerFactory::make(); //Паттерн Фабричный метод предлагает создавать объекты ненапрямую, используя оператор new , а через вызов особого фабричного метода.
//$worker->setName('boris');
//var_dump($worker->getName());
//
//
////более сложный пример от refactoring.guru
///**
// * Класс Создатель объявляет фабричный метод, который должен возвращать объект
// * класса Продукт. Подклассы Создателя обычно предоставляют реализацию этого
// * метода.
// */
//abstract class Creator
//{
//    /**
//     * Обратите внимание, что Создатель может также обеспечить реализацию
//     * фабричного метода по умолчанию.
//     */
//    abstract public function factoryMethod(): Product;
//
//    /**
//     * Также заметьте, что, несмотря на название, основная обязанность Создателя
//     * не заключается в создании продуктов. Обычно он содержит некоторую базовую
//     * бизнес-логику, которая основана на объектах Продуктов, возвращаемых
//     * фабричным методом. Подклассы могут косвенно изменять эту бизнес-логику,
//     * переопределяя фабричный метод и возвращая из него другой тип продукта.
//     */
//    public function someOperation(): string
//    {
//        // Вызываем фабричный метод, чтобы получить объект-продукт.
//        $product = $this->factoryMethod();
//        // Далее, работаем с этим продуктом.
//        $result = "Creator: The same creator's code has just worked with ".
//            $product->operation();
//
//        return $result;
//    }
//}
//
///**
// * Конкретные Создатели переопределяют фабричный метод для того, чтобы изменить
// * тип результирующего продукта.
// */
//class ConcreteCreator1 extends Creator
//{
//    /**
//     * Обратите внимание, что сигнатура метода по-прежнему использует тип
//     * абстрактного продукта, хотя фактически из метода возвращается конкретный
//     * продукт. Таким образом, Создатель может оставаться независимым от
//     * конкретных классов продуктов.
//     */
//    public function factoryMethod(): Product
//    {
//        return new ConcreteProduct1();
//    }
//}
//
//class ConcreteCreator2 extends Creator
//{
//    public function factoryMethod(): Product
//    {
//        return new ConcreteProduct2();
//    }
//}
//
///**
// * Интерфейс Продукта объявляет операции, которые должны выполнять все
// * конкретные продукты.
// */
//interface Product
//{
//    public function operation(): string;
//}
//
///**
// * Конкретные Продукты предоставляют различные реализации интерфейса Продукта.
// */
//class ConcreteProduct1 implements Product
//{
//    public function operation(): string
//    {
//        return "{Result of the ConcreteProduct1}";
//    }
//}
//
//class ConcreteProduct2 implements Product
//{
//    public function operation(): string
//    {
//        return "{Result of the ConcreteProduct2}";
//    }
//}
//
///**
// * Клиентский код работает с экземпляром конкретного создателя, хотя и через его
// * базовый интерфейс. Пока клиент продолжает работать с создателем через базовый
// * интерфейс, вы можете передать ему любой подкласс создателя.
// */
//function clientCode(Creator $creator)
//{
//    // ...
//    echo "Client: I'm not aware of the creator's class, but it still works.\n"
//        .$creator->someOperation();
//    // ...
//}
//
///**
// * Приложение выбирает тип создателя в зависимости от конфигурации или среды.
// */
//echo "App: Launched with the ConcreteCreator1.\n";
//clientCode(new ConcreteCreator1());
//echo "\n\n";
//
//echo "App: Launched with the ConcreteCreator2.\n";
//clientCode(new ConcreteCreator2());
//
////Пример 3 от chatGpt переключение баз данных
//
//// Абстрактный класс фабрики соединений
//abstract class ConnectionFactory {
//    abstract public function createConnection();
//}
//
//// Фабрика соединений для MySQL
//class MySQLConnectionFactory extends ConnectionFactory {
//    public function createConnection() {
//        return new MySQLConnection();
//    }
//}
//
//// Фабрика соединений для PostgreSQL
//class PostgreSQLConnectionFactory extends ConnectionFactory {
//    public function createConnection() {
//        return new PostgreSQLConnection();
//    }
//}
//
//// Фабрика соединений для SQLite
//class SQLiteConnectionFactory extends ConnectionFactory {
//    public function createConnection() {
//        return new SQLiteConnection();
//    }
//}
//
//// Абстрактный класс соединения
//abstract class Connection {
//    abstract public function connect();
//}
//
//// Реализация соединения с MySQL
//class MySQLConnection extends Connection {
//    public function connect() {
//        echo "Подключение к MySQL\n";
//    }
//}
//
//// Реализация соединения с PostgreSQL
//class PostgreSQLConnection extends Connection {
//    public function connect() {
//        echo "Подключение к PostgreSQL\n";
//    }
//}
//
//// Реализация соединения с SQLite
//class SQLiteConnection extends Connection {
//    public function connect() {
//        echo "Подключение к SQLite\n";
//    }
//}
//
//// Клиентский код
//function main() {
//    // Выбор типа базы данных
//    $dbType = readline("Введите тип базы данных (MySQL, PostgreSQL, SQLite): ");
//    $dbType = strtolower($dbType);
//
//    // Создание соединения с помощью фабричного метода
//    switch ($dbType) {
//        case 'mysql':
//            $connectionFactory = new MySQLConnectionFactory();
//            break;
//        case 'postgresql':
//            $connectionFactory = new PostgreSQLConnectionFactory();
//            break;
//        case 'sqlite':
//            $connectionFactory = new SQLiteConnectionFactory();
//            break;
//        default:
//            echo "Неподдерживаемый тип базы данных\n";
//            return;
//    }
//
//    // Создание соединения и подключение к базе данных
//    $connection = $connectionFactory->createConnection();
//    $connection->connect();
//}
//
//main();
