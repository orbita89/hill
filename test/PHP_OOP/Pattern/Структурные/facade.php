<?php
//
////todo: тот самый фасад у который будет доступ к другим классом
//class  WorkerFacade
//{
//    private Developer $developer;
//    private Designer $designer;
//
//    /**
//     * @param  Developer  $developer
//     * @param  Designer  $designer
//     */
//    public function __construct(Developer $developer, Designer $designer)
//    {
//        $this->developer = $developer;
//        $this->designer = $designer;
//    }
//
//    public function startWork()
//    {
//        $this->developer->startDevelop();
//        $this->designer->startDesigner();
//    }
//
//    public function stopWork()
//    {
//        $this->developer->stopDevelop();
//        $this->designer->stopDesigner();
//    }
//}
//
//class Developer
//{
//    public function startDevelop()
//    {
//        printf("Starting Developer" . PHP_EOL);
//    }
//
//    public function stopDevelop()
//    {
//        printf("stopping developer" . PHP_EOL);
//    }
//}
//
//class Designer
//{
//    public function startDesigner()
//    {
//        printf("Starting developer" . PHP_EOL);
//    }
//
//    public function stopDesigner()
//    {
//        printf("stopping developer" . PHP_EOL);
//    }
//}
//
//
//$developer = new Developer();
//$designer = new Designer();
//
//$workerFacade = new WorkerFacade($developer , $designer);
//
//$workerFacade->startWork();
