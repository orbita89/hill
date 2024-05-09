<?php

// неточности представления чисел с плавающей точкой
$testFailFloat = ((0.1 + 0.7) * 10);

var_dump((int)$testFailFloat);

$testFloatByString = '1239.212';

var_dump((float)$testFloatByString);

//сравнение чисел с плавающей точкой расчет разницы

$a = 1.23456789;
$b = 1.23456780;

$epsilon = 0.000001;

if ((abs($a - $b) < $epsilon)) { //$a - $b =  9.0000000367675E-8 unit roundoff = 0.000001
    echo "true";
}

// В PHP библиотека NaN (Not a Number) обычно используется в контексте работы с числами,
// которые не могут быть представлены в виде конкретного числового значения (например,
// деление на ноль или результат математической операции,
// не имеющий определенного значения).
// Вот пример использования NaN в PHP
$result = sqrt(-1);

echo $result;