<?php
//
//interface Worker
//{
//    public function closeHours($hours);
//
//    public function countSalary();
//}
//
//class WorkerOverTime implements Worker
//{
//    private array $hours = array();
//
//    public function closeHours($hours)
//    {
//        $this->hours[] = $hours;
//    }
//
//    public function countSalary(): Float|int
//    {
//        return array_sum($this->hours) * 500;
//    }
//}
//
//class WorkerProxy extends WorkerOverTime implements Worker
//{
//    private int $salary = 0;
//
//    public function countSalary(): Float|int
//    {
//        if ($this->salary === 0) {
//            $this->salary = parent::countSalary();
//        }
//        return $this->salary;
//    }
//}
//
//$worker = new WorkerProxy();
//
//$worker->closeHours(10);
//$salary = $worker->countSalary();
//$worker->closeHours(10);
//$worker->closeHours(10);
//
//
//var_dump($worker->countSalary());
//
////todo смысл в том что после первого запуска мы сохраняем результат по типу кэшируем