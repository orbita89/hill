<?php
//
//class WorkerPool
//{
//    private array $freeWorkc = [];
//
//    private array $busyWorkc = [];
//
//    /**
//     * @return array
//     */
//    public function getFreeWorkc(): array
//    {
//        return $this->freeWorkc;
//    }
//
//    /**
//     * @param  array  $freeWorkc
//     */
//    public function setFreeWorkc(array $freeWorkc): void
//    {
//        $this->freeWorkc = $freeWorkc;
//    }
//
//    /**
//     * @return array
//     */
//    public function getBusyWorkc(): array
//    {
//        return $this->busyWorkc;
//    }
//    /**
//     * @param  array  $busyWorkc
//     */
//    public function setBusyWorkc(array $busyWorkc): void
//    {
//        $this->busyWorkc = $busyWorkc;
//    }
//
//    public function getWorker(): Worker
//    {
//        if (count($this->freeWorkc) === 0) {
//            $worker = new Worker();
//        } else {
//            $worker = array_pop($this->freeWorkc);
//        }
//
//        $this->busyWorkc[spl_object_hash($worker)] = $worker;
//
//        return $worker;
//    }
//
//    public function release(Worker $worker)
//    {
//        $key = spl_object_hash($worker);
//
//        if (isset($this->busyWorkc[$key])) {
//            unset($this->busyWorkc[$key]);
//            $this->freeWorkc[$key] = $worker;
//        }
//    }
//}
//
//class Worker
//{
//    public function work()
//    {
//        printf("Im working");
//    }
//}
//
//$pool = new WorkerPool();
//
//$worker = $pool->getWorker();
//$worker1 = $pool->getWorker();
//$worker2= $pool->getWorker();
//$worker3 = $pool->getWorker();
//
//$pool->release($worker3);
//
//var_dump($pool->getFreeWorkc());
