<?php
//
//interface NativeWorker
//{
//    public function countSalary();
//}
//
//interface OutsourceWorker
//{
//    public function countSalaryByHour($hours);
//}
//
//class NativeDeveloper implements NativeWorker
//{
//    public function countSalary(): Float|int
//    {
//        return 3000 * 20;
//    }
//}
//
//class OutsourceDeveloper implements OutsourceWorker
//{
//    public function countSalaryByHour($hours): Float|int
//    {
//        return $hours * 500;
//    }
//}
//
//class OutsourceWorkerAdapter implements NativeWorker
//{
//    private OutsourceWorker $outsourceWorker;
//
//    /**
//     * @param  OutsourceWorker  $outsourceWorker
//     */
//    public function __construct(OutsourceWorker $outsourceWorker)
//    {
//        $this->outsourceWorker = $outsourceWorker;
//    }
//
//    public function countSalary(): int
//    {
//        return $this->outsourceWorker->countSalaryByHour(1);
//    }
//}
//
//$nativeDeveloper = new NativeDeveloper();
//$outsourceDeveloper = new OutsourceDeveloper();
//
//$outsourceWorkerAdapter = new OutsourceWorkerAdapter($outsourceDeveloper);
//
//var_dump($outsourceWorkerAdapter->countSalary());