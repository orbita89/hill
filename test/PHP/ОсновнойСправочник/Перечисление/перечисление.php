<?php

enum Weekday {
    case MONDAY;
    case TUESDAY;
    case WEDNESDAY;
    case THURSDAY;
    case FRIDAY;
    case SATURDAY;

    case SUNDAY;

    public function isWeekend(): bool {
        return in_array($this, [self::SATURDAY, self::SUNDAY]);
    }
}

// Использование перечисления
$today = Weekday::MONDAY;
echo $today->name; // Выведет: Weekday::MONDAY

// Вызов метода перечисления
if ($today->isWeekend()) {
    echo "It's weekend!";
} else {
    echo "It's a weekday.";
}