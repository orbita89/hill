<?php


//array_change_key_case — Меняет регистр всех ключей в массиве
//$input_array = array("FirSt" => 1, "SecOnd" => 4);
//print_r(array_change_key_case($input_array));
//
////Array
////(
////    [first] => 1
////    [second] => 4
////)

//разбивает массив на части
//$input_array = array('a', 'b', 'c', 'd', 'e');
//
//print_r(array_chunk($input_array, 3));
//print_r(array_chunk($input_array, 2, true));

//array_column — Возвращает массив из значений одного столбца входного массива
//$records = array(
//    array(
//        'id' => 2135,
//        'first_name' => 'John',
//        'last_name' => 'Doe',
//    ),
//    array(
//        'id' => 3245,
//        'first_name' => 'Sally',
//        'last_name' => 'Smith',
//    ),
//    array(
//        'id' => 5342,
//        'first_name' => 'Jane',
//        'last_name' => 'Jones',
//    ),
//    array(
//        'id' => 1,
//        'first_name' => 'Peter',
//        'last_name' => 'Doe',
//    )
//);
//
//$first_names = array_column($records, 'first_name', 'id'); //третий параметр индексируется как строка  [2135] => John
//print_r($first_names);

//array_combine — Создаёт новый массив, используя один массив в качестве ключей, а другой для его значений
//
//$a = array('green', 'red', 'yellow');
//$b = array('avocado', 'apple', 'banana');
//$c = array_combine($a, $b);  //Объединяет два массива первый аргумент - ключ, второе - значение.
//
//print_r($c);

//array_count_values — Подсчитывает количество каждого значения в массиве в примере количество,
// hello - 2 получается ключ [hello] = значение тоже 2
//$array = array(1, "hello", 1, "world", "hello");
//print_r(array_count_values($array));

//array_diff_assoc — Вычисляет расхождение массивов с дополнительной проверкой индекса
//$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
//$array2 = array("a" => "green", "yellow", "red");
//$result = array_diff_assoc($array1, $array2);
//
//print_r($result);

//array_diff_key — Вычисляет расхождение массивов, сравнивая ключи
//$array1 = array('blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4);
//$array2 = array('green' => 5, 'yellow' => 7, 'cyan' => 8);
//
//var_dump(array_diff_key($array1, $array2)); //выводит расхождения первого массива


//array_diff_uassoc — Вычисляет расхождение массивов с дополнительной проверкой индекса через пользовательскую callback-функцию


//function key_compare_func($a, $b)
//{
//    if ($a === $b) {
//        return 0;
//    }
//    return $a <=> $b;
//}
//$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
//$array2 = array("a" => "green", "yellow", "red");
//$result = array_diff_uassoc($array1, $array2, "key_compare_func");
//print_r($result);

//array_fill()
//$a = array_fill(5, 6, 'банан,K');
//print_r($a);

// array_filter() - фильтр с помощью callback

//function odd($var)
//{
//    // является ли переданное число нечётным
//    return $var === 1;
//}
//
//function even($var)
//{
//    // является ли переданное число чётным
//    return !($var & 1);
//}
//
//$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
//$array2 = [6, 7, 8, 9, 10, 11, 12];
//
//echo "Нечётные:\n";
//print_r(array_filter($array1, "odd"));
////echo "Чётные:\n";
////print_r(array_filter($array2, "even"));

//еще один пример

//$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
//
//var_dump(array_filter($arr, function($k) {
//    return $k === 'b';
//}, ARRAY_FILTER_USE_KEY));
//
//var_dump(array_filter($arr, function($v, $k) {
//    return $k === 'b' || $v === 4;
//}, ARRAY_FILTER_USE_BOTH));

//array_intersect - как gif только наоборот

//array_product

//$a = array(
//    2,
//    2,
//);
//echo array_product($a);


//array_push добавляет одно или несколько значений в конец массива

//$stack = array("orange", "banana");
////array_push($stack, "apple", "raspberry");
//$stack[] = "apple"; //так быстрее
//print_r($stack);

//array_reduce -  последовательного применения функции обратного вызова к элементам массива, сокращая его до одного значения.

//function sum($accumulator, $currentValue) {
//    return $accumulator + $currentValue;
//}
//
//// Исходный массив
//$array = [1, 2, 3, 4, 5];
//
//// Вызов array_reduce() для суммирования элементов массива
//$result = array_reduce($array, 'sum', -3);
//
//echo $result;

//еще один пример

//function concatenate($accumulator, $currentValue) {
//    return $accumulator . ' ' . $currentValue;
//}
//
//// Исходный массив строк
//$array = ["Hello", "world", "from", "PHP"];
//
//// Вызов array_reduce() для конкатенации строк
//$result = array_reduce($array, 'concatenate', "Error 2077:");
//
//echo $result;

//функция array_replace
//$array1 = array('a' => 1, 'b' => 2, 'c' => 3);
//$array2 = array('b' => 4, 'c' => 5, 'd' => 6);
//
//$result = array_replace($array1, $array2);

//print_r($result);

//Исходный массив $array1 содержит элементы с ключами 'a', 'b' и 'c'.
//Второй массив $array2 содержит элементы с ключами 'b', 'c' и 'd'.
//Функция array_replace() заменяет значения в массиве $array1 значениями из массива $array2.
//Ключи из $array1, которые присутствуют в $array2, получают новые значения из $array2.
//Ключи из $array2, которых нет в $array1, добавляются к массиву.
//Ключи из $array1, которых нет в $array2, остаются без изменений.

//array_search() - поиск значений

//$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 112 => 'red');
//
////$key = array_search('green', $array); // $key = 2;
//$key1 = array_search('red', $array);
//
//print_r($key1);
////print_r($key);

//array_shift() - извлекает первое значения

//$stack = array("orange", "banana", "apple", "raspberry");
//$fruit = array_shift($stack);
//print_r($stack);

//array_slice - выбирает срез массива


//$input = array("a", "b", "c", "d", "e");
//
//$output = array_slice($input, 2);      // возвращает "c", "d" и "e"
//$output1 = array_slice($input, -2, 1);  // возвращает "d"
//$output2 = array_slice($input, 0, 3);   // возвращает "a", "b" и "c"
//
//print_r($output);
//print_r($output1);
//print_r($output2);
//// обратите внимание на различия в индексах массивов
//print_r(array_slice($input, 2, -1));
//print_r(array_slice($input, 2, -1, true));

//array_splice - Удаляет часть массива и заменяет её чем-нибудь ещё

//$input = array("red", "green", "blue", "yellow");
//array_splice($input, -2, 1, array("black", "maroon"));
//var_dump($input);

//array_udiff_assoc — Вычисляет расхождение в массивах с дополнительной проверкой индексов,
//используя для сравнения значений callback-функцию

// Пользовательская функция сравнения для сравнения элементов по ключу и значению
//function compareByKeyAndValue($a, $b) {
//    if ($a === $b) {
//        return 0; //функция array_udiff_assoc
//    }
//    return ($a > $b) ? 1 : -1;
//}
//
//// Исходные массивы
//$array1 = array('a' => 1, 'b' => 2, 'c' => 3);
//$array2 = array('a' => 1, 'b' => 2, 'c' => 5);
//
//// Вызов array_udiff_assoc() для вычисления разницы между массивами с использованием пользовательской функции сравнения
//$result = array_udiff_assoc($array1, $array2, 'compareByKeyAndValue');
//
//print_r($result);
//


//array_unique - Убирает повторяющиеся значения из массива

//$input = array("a" => "green", "red", "b" => "green", "blue", "red");
//$result = array_unique($input);
//print_r($result);

//array_unshift — Добавляет один или несколько элементов в начало массива

//$queue = [
//    "orange",
//    "banana"
//];
//
//array_unshift($queue, "apple", "raspberry");
//var_dump($queue);

//array_values

//$array = array('a' => 'apple', 'b' => 'banana', 'c' => 'cherry');
//$values = array_values($array);
//print_r($values);
//Эта функция часто используется, когда вам нужно работать с значениями массива, независимо от ключей, или когда вам нужно преобразовать ассоциативный массив в обычный (последовательный) массив.

//arsort
//$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
//$a = arsort($fruits);
//var_dump($fruits);

//compact Создаёт массив, содержащий названия переменных и их значения

//$city  = "San Francisco";
//$state = "CA";
//$event = "SIGGRAPH";
//
//$location_vars = array("city", "state");
//
//$result = compact("event", $location_vars);
//print_r($result);

//extract() она создает переменные из ключей массива и присваивает им значения, соответствующие значениям из массива.
//$fruits = array("as" => "red", "banana" => "yellow", "orange" => "orange");
//
//extract($fruits);
//
//echo $as; // Выведет: red
//echo $banana; // Выведет: yellow
//echo $orange;

//in_array

//$a = array('1.10', 12.4, 1.13);
//
//
//if (in_array(1.13, $a, true)) {
//    echo "'12.4' найдено со строгой проверкой\n";
//}

//range
//echo implode(', ', range(0, 12)), PHP_EOL;

