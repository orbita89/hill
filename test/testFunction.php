<?php

$skus = ['ABC123', 'DEF456', 'GHI789'];

// Пример использования array_map с использованием анонимной функции
$newArray = array_map(static function($sku) {
    return "'$sku'";
}, $skus);

$newArray1 = array_map(static fn($sku) => "'$sku'", $skus);

// Функция для преобразования строки в верхний регистр
function toUpper($str): string
{
    return strtoupper($str);
}

$words = ['apple', 'banana', 'orange'];

// Применяем функцию toUpper к каждому элементу массива $words
$newWords = array_map('toUpper', $words);

print_r($newWords);


$numbers = [1, 2, 3, 4, 5];
$squaredNumbers = array_map(static fn($num) => $num * $num, $numbers);

$numbers = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($numbers, static fn($num) => $num % 2 === 0);


$array1 = array("a" => "apple", "b" => "banana");
$array2 = array("c" => "cherry", "d" => "date");

$result = array_merge($array1, $array2);

$num = 1;

