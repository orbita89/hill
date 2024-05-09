<?php
//
//abstract class registry
//{
//    private static array $services = array();
//
//    final public static function getServices($key): string|Service
//    {
//        if (isset(self::$services[$key])) {
//            return self::$services[$key];
//        }
//        return 'The service';
//    }
//
//    final public static function setServices($key, Service $service)
//    {
//        self::$services[$key] = $service;
//    }
//}
//
//class Service
//{
//    public $asa= 2;
//
//    /**
//     * @return int
//     */
//    public function getAsa(): int
//    {
//        return $this->asa;
//    }
//}
//
//$service = new Service();
//
//Registry::setServices(40,$service);
//
//$service = Registry::getServices(1);
//
//var_dump($service);