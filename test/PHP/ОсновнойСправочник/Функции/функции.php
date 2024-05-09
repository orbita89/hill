<?php

//передача по ссылки
//это ссылка на переменную. Это означает, что изменения, внесенные внутри функции в переменную $string,
// отразятся на самой переменной в вызывающем коде.
//function add_some_extra(&$string)
//{
//    $string .= 'и кое-что ещё.';
//}
//
//$str = 'Это строка, ';
//add_some_extra($str);
//echo $str;    // Выведет «Это строка, и кое-что ещё.»

//spread - все числа объединяет в массив
//function sum(...$numbers) {
//    $acc = 0;
//
//    foreach ($numbers as $n) {
//        $acc += $n;
//    }
//
//    return $acc;
//}
//
//echo sum(1, 2, 3, 4);

//Передача аргументов через spread-оператор ...
//function add($a, $b) {
//    return $a + $b;
//}
//
//echo add(...[1, 2])."\n";
//
//$a = [1, 2];
//echo add(...$a);

//возврат по ссылки
//function &returns_reference(): int
//{
//    static $somewhere = 0;
//    $somewhere++;
//    return $somewhere;
//}
//
//$newref =& returns_reference();
//echo $newref . PHP_EOL; // Выведет: 1
//
//$newref++;
//echo $newref  . PHP_EOL;// Выведет: 2
//
////Мы кладём в эту переменную ссылку функции
//$newref++;
//echo $newref  . PHP_EOL;
//
//
////теперь когда повторно вызываем эту функцию то будет результат от переменной $newref++
////если убрать ссылку то переменная будет ровно 2 так как функцию вызвали два раз
//$newref2 =& returns_reference();
//echo $newref2  . PHP_EOL;

//
//
//// Базовая корзина покупок, которая содержит список
//// продуктов и количество каждого продукта. Включает метод,
//// который вычисляет общую цену элементов корзины через
//// callback-замыкание
//class Cart
//{
//    const PRICE_BUTTER  = 1.00;
//    const PRICE_MILK    = 3.00;
//    const PRICE_EGGS    = 6.95;
//
//    protected $products = array();
//
//    public function add($product, $quantity)
//    {
//        $this->products[$product] = $quantity;
//    }
//
//    public function getQuantity($product)
//    {
//        return isset($this->products[$product]) ? $this->products[$product] :
//            FALSE;
//    }
//
//
//    //пример анонимной функции
//    public function getTotal($tax)
//    {
//        $total = 0.00;
//
//        $callback = function ($quantity, $product) use ($tax, &$total)
//        {
//            $pricePerItem = constant(
//                __CLASS__ . "::PRICE_" . strtoupper($product)
//            );
//
//            $total += ($pricePerItem * $quantity) * ($tax + 1.0);
//        };
//
//        array_walk($this->products, $callback);
//        return round($total, 2);
//    }
//}
//
//$my_cart = new Cart;
//
//// Добавляем элементы в корзину
//$my_cart->add('butter', 1);
//$my_cart->add('milk', 3);
//$my_cart->add('eggs', 6);
//
//// Выводим общую сумму с налогом 5 % на продажу
//print $my_cart->getTotal(0.05) . "\n";
//// Результат будет равен 54.29

// Стрелочные функции появились в PHP 7.4 как лаконичный синтаксис для анонимных функций.

$y = 1;

$fn1 = fn($x) => $x + $y;

// Эквивалентно получению переменной $y по значению:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn2(3));

function foo(&$var) {
    $var++;
}

$a = 5;
foo($a);
// $a здесь равно 6


$a = 2;
$b =& $a;
$c = 1;

for($i = 0; $i < $b; $i++) {
    echo $a;
    echo $c++;
    echo $b;
}

echo $c;
unset($a);

echo $b;
$b++;
echo $b;

