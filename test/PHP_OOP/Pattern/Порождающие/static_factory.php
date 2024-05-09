<?php
//
//interface Worker
//{
//    public function work();
//}
//
//class Development implements Worker
//{
//    public function work()
//    {
//        printf('Worker started development'.PHP_EOL);
//    }
//}
//
//class Designer implements Worker
//{
//    public function work()
//    {
//        printf('Worker started designating');
//    }
//}
//
//class  WorkerFactory
//{
//    public static function make($workerTitle): ?Worker
//    {
//        $className = strtolower($workerTitle);
//
//        if (class_exists($className)) {
//            return new $className();
//        }
//
//        return null;
//    }
//}
//
//$developer = WorkerFactory::make('developer');
//
//// FIXME: Схожесть: на метод factory_method одна и та же структура
//// FIXME: Отличие: только в тот что здесь есть статичный метод который будет выбирать нужный класс WorkerFactory