<?php
//
////Вывод глобальной переменны
////$a = 1;
//$b = 2;
//
//$globals = $GLOBALS;
//
//function Sum()
//{
//    global $a, $b;
//
//    $b = $a + $b;
//}
//
//Sum();


//echo $b;

//static
//$a = 0;
//function test()
//{
//    static $a;
//    echo $a;
//    $a++;
//}
//
//test();
//test();
//test();
//test();
//
//echo $a + 1;
//
//// Объявление статических переменных вызов функции вызовет ошибку
//
//function foo()
//{
//    static $int = 0;         // Правильно
//    static $int = 1 + 2;     // Правильно
////    static $int = sqrt(121);  // Неправильно, поскольку это функция
//
//    $int++;
//    echo $int;
//}


//function test_global_ref() {
//    global $obj;
//    $new = new stdClass();
//    $obj = &$new;
//}
//
//function test_global_noref() {
//    global $obj;
//    $new = new stdClass();
//    $obj = $new;
//}
//
//test_global_ref();
//var_dump($obj);
//test_global_noref();
//var_dump($obj);

//переменные переменных
//$a = 'yes';
//
//$$a = 'hello';
//
//$$$a = 'world';

//echo $a;

//    echo "$a {$$$a}";

//$name = 'user';
//$$name = 'John';
//echo $user;

$table = 'users';
$$table = ['name' => 'John', 'age' => 30];
// Где-то еще в коде
echo "User name: {$$table['name']}, Age: {$$table['age']} $users";

//пример использование суперглобальных переменных
//echo __LINE__ . PHP_EOL;
//echo __FILE__ . PHP_EOL;
//echo __DIR__ . PHP_EOL;
//
//
//class MyClass {
//    use MyTrait;
//
//    public function myMethod() {
//        echo "Function: " . __FUNCTION__ . "\n"; // Имя метода
//        echo "Class: " . __CLASS__ . "\n"; // Имя класса с пространством имен
//        echo "Trait: " . __TRAIT__ . "\n"; // Имя трейта с пространством имен
//        echo "Method: " . __METHOD__ . "\n"; // Имя метода с пространством имен класса
//        echo "Namespace: " . __NAMESPACE__ . "\n"; // Пространство имен
//    }
//}
//
//trait MyTrait {
//    public function anotherMethod() {
//        echo "Function: " . __FUNCTION__ . "\n"; // Имя метода
//        echo "Class: " . __CLASS__ . "\n"; // Имя класса с пространством имен
//        echo "Trait: " . __TRAIT__ . "\n"; // Имя трейта с пространством имен
//        echo "Method: " . __METHOD__ . "\n"; // Имя метода с пространством имен класса
//        echo "Namespace: " . __NAMESPACE__ . "\n"; // Пространство имен
//    }
//}
//
//$obj = new MyClass();
//$obj->myMethod(); // Вызов метода класса
//$obj->anotherMethod(); // Вызов метода трейта




