<?php


//
//// Пример callback-функции
//function my_callback_function(): void
//{
//    echo 'Привет, мир!';
//}
//
//my_callback_function();
//
//class MyClass {
//    static function myCallbackMethod() {
//        echo 'Привет, мир!';
//    }
//}
//
//
//call_user_func(array('MyClass', 'myCallbackMethod'));
//
//
////function checkFunction(callable $callback) {
////    if (is_callable($callback)) {
////        echo "Можно вызвать этот объект как функцию";
////    } else {
////        echo "Нельзя вызвать этот объект как функцию";
////    }
////}
//
//
$array = [1, 2, 3, 4, 5];

// Пример использования array_map с анонимной функцией
$squared = array_map(function($x) { return $x * $x; }, $array);

// Пример использования array_filter с пользовательской функцией
$evenNumbers = array_filter($array, function($x) { return $x % 2 === 0; });

$q = 'SELECT';
//
//function getCallback(): callable {
//    return 'Illuminate\Contracts\Database\Query\'
//}
//
//$a = $squared;

function throwError($message): never {
    throw new Exception($message);
}

try {
    throwError("This function always throws an exception");
} catch (Exception $e) {
    echo "Caught exception: ", $e->getMessage(), "\n";
}