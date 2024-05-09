<?php

//match
$dayOfWeek = 'zxz';

$result = match ($dayOfWeek) {
    'Mon' => 'Понедельник',
    'Tue' => 'Вторник',
    'Wed' => 'Среда',
    'Thu' => 'Четверг',
    'Fri' => 'Пятница',
    'Sat' => 'Суббота',
    'Sun' => 'Воскресенье',
    default => 'Неизвестный день',
};

echo $result;

//continue
for ($i = 0; $i < 5; $i++) {
    if ($i == 2) {
        continue; // Пропускаем итерацию, если $i равно 2
    }
    echo $i . ", ";
}