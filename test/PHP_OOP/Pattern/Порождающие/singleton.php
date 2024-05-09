<?php
//
//final class Connection
//{
//    private static ?self $instance =  null;
//    private static string $name;
//
//    /**
//     * @return string
//     */
//    public static function getName(): string
//    {
//        return self::$name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public static function setName(string $name): void
//    {
//        self::$name = $name;
//    }
//    public static function getInstance(): self
//    {
//        if (self::$instance === null) {
//            self::$instance = new self();
//        }
//
//        return self::$instance;
//    }
//
//    public function __clone(): void
//    {
//        // TODO: Implement __clone() method.
//    }
//
//    public function __wakeup(): void
//    {
//        // TODO: Implement __wakeup() method.
//    }
//}
//
//$connection = Connection::getInstance();
//$connection::setName('connection');
//
//$connection2 = Connection::getInstance();
//
//var_dump($connection2::getName());
//
////пример от refactoring.guru
//
///**
// * Класс Одиночка предоставляет метод `GetInstance`, который ведёт себя как
// * альтернативный конструктор и позволяет клиентам получать один и тот же
// * экземпляр класса при каждом вызове.
// */
//class Singleton
//{
//    /**
//     * Объект одиночки храниться в статичном поле класса. Это поле — массив, так
//     * как мы позволим нашему Одиночке иметь подклассы. Все элементы этого
//     * массива будут экземплярами кокретных подклассов Одиночки. Не волнуйтесь,
//     * мы вот-вот познакомимся с тем, как это работает.
//     */
//    private static $instances = [];
//
//    /**
//     * Конструктор Одиночки всегда должен быть скрытым, чтобы предотвратить
//     * создание объекта через оператор new.
//     */
//    protected function __construct()
//    {
//    }
//
//    /**
//     * Одиночки не должны быть клонируемыми.
//     */
//    protected function __clone()
//    {
//    }
//
//    /**
//     * Одиночки не должны быть восстанавливаемыми из строк.
//     */
//    public function __wakeup()
//    {
//        throw new \Exception("Cannot unserialize a singleton.");
//    }
//
//    /**
//     * Это статический метод, управляющий доступом к экземпляру одиночки. При
//     * первом запуске, он создаёт экземпляр одиночки и помещает его в
//     * статическое поле. При последующих запусках, он возвращает клиенту объект,
//     * хранящийся в статическом поле.
//     *
//     * Эта реализация позволяет вам расширять класс Одиночки, сохраняя повсюду
//     * только один экземпляр каждого подкласса.
//     */
//    public static function getInstance(): Singleton
//    {
//        $cls = static::class;
//        if (!isset(self::$instances[$cls])) {
//            self::$instances[$cls] = new static();
//        }
//
//        return self::$instances[$cls];
//    }
//
//    /**
//     * Наконец, любой одиночка должен содержать некоторую бизнес-логику, которая
//     * может быть выполнена на его экземпляре.
//     */
//    public function someBusinessLogic()
//    {
//        // ...
//    }
//}
//
///**
// * Клиентский код.
// */
//function clientCode()
//{
//    $s1 = Singleton::getInstance();
//    $s2 = Singleton::getInstance();
//    if ($s1 === $s2) {
//        echo "Singleton works, both variables contain the same instance.";
//    } else {
//        echo "Singleton failed, variables contain different instances.";
//    }
//}
//
//clientCode();