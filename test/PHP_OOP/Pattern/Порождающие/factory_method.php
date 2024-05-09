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
//        printf('Worker started development' . PHP_EOL);
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
//interface WorkerFactory
//{
//    public static function make();
//}
//
//class DeveloperFactory implements WorkerFactory
//{
//
//    public static function make(): Development
//    {
//        return new Development();
//    }
//}
//
//class DisegnerFactory implements WorkerFactory
//{
//
//    public static function make(): Designer
//    {
//        return new Designer();
//    }
//}
//
//$def = DeveloperFactory::make();
//$dif = DisegnerFactory::make();
//
//$def->work();
//$dif->work();