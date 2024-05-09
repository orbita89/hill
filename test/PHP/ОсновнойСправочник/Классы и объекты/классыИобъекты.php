<?php

//пример использование parent - берёт из родительского метода
//class ParentClass
//{
//    protected function hello()
//    {
//        echo "Hello from ParentClass!";
//    }
//}
//
//class ChildClass extends ParentClass
//{
//    public function hello()
//    {
//        parent::hello(); // Вызываем метод hello() из родительского класса
//        echo " And hello from ChildClass!";
//    }
//}
//
//$child = new ChildClass();
//$child->hello();




//class Base
//{
//    public function foo(int $a = 5)
//    {
//        echo "Допустимо\n";
//    }
//}
//
//class Extend extends Base
//{
//    function foo()
//    {
//        parent::foo(1);
//    }
//} примеры ошибок Parent::


//readonly

//class Test
//{
//    public readonly string $prop;
//
//    public function __construct(string $prop)
//    {
//        // Правильная инициализация.
//        $this->prop = $prop;
//    }
//}
//
//$test = new Test("foobar");
//$test1 = new Test("foob1ar");
//
//// Правильное чтение
//var_dump($test1->prop); // string(6) "foobar"
//
//// Неправильное переопределение. Не имеет значения, что присвоенное значение такое же
////$test->prop = "foobar";
//// Error: Cannot modify readonly property Test::$prop...readonly


//
//class Foo {
//    public const BAR = 'bar';
//    private const BAZ = 'baz';
//}
//echo Foo::BAR, PHP_EOL; //взять свойства константы можно так пример вызова констант



//поведение конструктора
//class BaseClass
//{
//    function __construct()
//    {
//        print "Конструктор класса BaseClass\n";
//    }
//}
//
//class SubClass extends BaseClass
//{
//    function __construct()
//    {
//        parent::__construct();
//        print "Конструктор класса SubClass\n";
//    }
//}
//
//class OtherSubClass extends BaseClass
//{
//    // Наследует конструктор класса BaseClass
//}
//
//class OtherRusSubClass extends SubClass
//{
//    // Наследует конструктор класса BaseClass
//}

// Конструктор класса BaseClass
//$obj = new BaseClass();

// Конструктор класса BaseClass
// Конструктор класса SubClass
//$obj1 = new SubClass();

// Конструктор класса BaseClass
//$obj2 = new OtherSubClass();

//// Конструктор класса BaseClass
//// Конструктор класса SubClass
//$obj3 = new OtherRusSubClass();


//итерация проход по всем значениям
//class MyClass
//{
//    public $var1 = 'значение 1';
//    public $var2 = 'значение 2';
//    public $var3 = 'значение 3';
//
//    protected $protected = 'защищённая переменная';
//    private   $private   = 'закрытая переменная';
//
//    function iterateVisible() {
//        echo "MyClass::iterateVisible:\n";
//        foreach ($this as $key => $value) {
//            print "$key => $value\n";
//        }
//    }
//}
//
//$class = new MyClass();
//
//$class->iterateVisible();

//static::

//пример разницы static и self
//class A {
//    public static function who() {
//        echo __CLASS__;
//    }
//    public static function test() {
//        self::who();
//    }
//}
//
//class B extends A {
//    public static function who() {
//        echo __CLASS__;
//    }
//}
//
//B::test();
//echo "</n>";
//
//class Astatic {
//    public static function who() {
//        echo __CLASS__;
//    }
//    public static function test() {
//        static::who(); // Здесь действует позднее статическое связывание
//    }
//}
//
//class Bstatic extends Astatic {
//    public static function who() {
//        echo __CLASS__;
//    }
//}
//
//Bstatic::test();


//
//class A {
//    private function foo() {
//        echo "success!\n";
//    }
//    public function test() {
//        $this->foo();
//        static::foo();
//    }
//}
//
//class B extends A {
//    /* foo() будет скопирован в В, следовательно его область действия по прежнему А,
//       и вызов будет успешным */
//}
//
//class C extends A {
//    private function foo() {
//        /* исходный метод заменён; область действия нового метода - С */
//    }
//}
//
//$b = new B();
//$b->test();
//$c = new C();
//$c->test();   // потерпит ошибку