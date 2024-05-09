<?php
//
//interface Worker
//{
//    public function work();
//}
//
//class ObjectManager
//{
//    private Worker $worker;
//
//    /**
//     * @param  Worker  $worker
//     */
//    public function __construct(Worker $worker)
//    {
//        $this->worker = $worker;
//    }
//
//    public function goWork()
//    {
//        $this->worker->work();
//    }
//}
//
//class Developer implements Worker
//{
//    public function work()
//    {
//        printf("Developer");
//    }
//}
////todo смысл в том что не получить ошибку когда у нас приходит null
//class NullWorker implements Worker
//{
//    public function work()
//    {
//    }
//}
//
//$developer = new Developer();
//
//$nullDeveloper = new NullWorker();
//
//$objectManager = new ObjectManager($nullDeveloper);
//
//$objectManager->goWork();