<?php
//
//interface Mediator
//{
//    public function getWorker();
//}
//
//abstract class Worker
//{
//    private string $name;
//
//    /**
//     * @param  string  $name
//     */
//    public function __construct(string $name)
//    {
//        $this->name = $name;
//    }
//
//    public function sayHello()
//    {
//        printf('Hello');
//    }
//
//    public function work()
//    {
//        return $this->name.' is working';
//    }
//}
//
//class InfoBase
//{
//    public function printInfo(Worker $worker)
//    {
//        printf($worker->work());
//    }
//}
//
//class WorkerInfoBaseMediator implements Mediator
//{
//    private Worker $worker;
//    private InfoBase $info;
//
//    /**
//     * @param  Worker  $worker
//     * @param  InfoBase  $info
//     */
//    public function __construct(Worker $worker, InfoBase $info)
//    {
//        $this->worker = $worker;
//        $this->info = $info;
//    }
//
//    public function getWorker()
//    {
//        $this->info->printInfo($this->worker);
//    }
//}
//
//class Developer extends Worker
//{
//
//}
//
//$developer = new Developer('boris');
//$infoBase = new InfoBase();
//$workerInfoBaseMediator = new WorkerInfoBaseMediator($developer, $infoBase);
//
//$workerInfoBaseMediator->getWorker();
//
////refactoring.guru
//
///**
// * Интерфейс Посредника предоставляет метод, используемый компонентами для
// * уведомления посредника о различных событиях. Посредник может реагировать на
// * эти события и передавать исполнение другим компонентам.
// */
//interface Mediator
//{
//    public function notify(object $sender, string $event): void;
//}
//
///**
// * Конкретные Посредники реализуют совместное поведение, координируя отдельные
// * компоненты.
// */
//class ConcreteMediator implements Mediator
//{
//    private $component1;
//
//    private $component2;
//
//    public function __construct(Component1 $c1, Component2 $c2)
//    {
//        $this->component1 = $c1;
//        $this->component1->setMediator($this);
//        $this->component2 = $c2;
//        $this->component2->setMediator($this);
//    }
//
//    public function notify(object $sender, string $event): void
//    {
//        if ($event == "A") {
//            echo "Mediator reacts on A and triggers following operations:\n";
//            $this->component2->doC();
//        }
//
//        if ($event == "D") {
//            echo "Mediator reacts on D and triggers following operations:\n";
//            $this->component1->doB();
//            $this->component2->doC();
//        }
//    }
//}
//
///**
// * Базовый Компонент обеспечивает базовую функциональность хранения экземпляра
// * посредника внутри объектов компонентов.
// */
//class BaseComponent
//{
//    protected $mediator;
//
//    public function __construct(Mediator $mediator = null)
//    {
//        $this->mediator = $mediator;
//    }
//
//    public function setMediator(Mediator $mediator): void
//    {
//        $this->mediator = $mediator;
//    }
//}
//
///**
// * Конкретные Компоненты реализуют различную функциональность. Они не зависят от
// * других компонентов. Они также не зависят от каких-либо конкретных классов
// * посредников.
// */
//class Component1 extends BaseComponent
//{
//    public function doA(): void
//    {
//        echo "Component 1 does A.\n";
//        $this->mediator->notify($this, "A");
//    }
//
//    public function doB(): void
//    {
//        echo "Component 1 does B.\n";
//        $this->mediator->notify($this, "B");
//    }
//}
//
//class Component2 extends BaseComponent
//{
//    public function doC(): void
//    {
//        echo "Component 2 does C.\n";
//        $this->mediator->notify($this, "C");
//    }
//
//    public function doD(): void
//    {
//        echo "Component 2 does D.\n";
//        $this->mediator->notify($this, "D");
//    }
//}