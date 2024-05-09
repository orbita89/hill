<?php
//
//interface Command
//{
//    public function execute();
//}
//
//interface Undoable extends Command
//{
//    public function undo();
//}
//
//class Output
//{
//    private bool $isEnabled = true;
//
//    private string $body = '';
//
//    public function enable(): void
//    {
//        $this->isEnabled = true;
//    }
//
//    public function disable(): void
//    {
//        $this->isEnabled = false;
//    }
//
//    /**
//     * @return string
//     */
//    public function getBody(): string
//    {
//        return $this->body;
//    }
//
//    public function write($str)
//    {
//        if ($this->isEnabled) {
//            $this->body = $str;
//        }
//    }
//}
//
//class Invoker
//{
//    private Command $command;
//
//    /**
//     * @param  Command  $command
//     */
//    public function setCommand(Command $command): void
//    {
//        $this->command = $command;
//    }
//
//    public function run()
//    {
//        $this->command->execute();
//    }
//}
//
//class Message implements Command
//{
//    private Output $output;
//
//    /**
//     * @param  Output  $output
//     */
//    public function __construct(Output $output)
//    {
//        $this->output = $output;
//    }
//
//    public function execute()
//    {
//        $this->output->write('run str');
//    }
//}
//
//class ChangerStatus implements Undoable
//{
//
//    private Output $output;
//
//    /**
//     * @param  Output  $output
//     */
//    public function __construct(Output $output)
//    {
//        $this->output = $output;
//    }
//
//    public function execute(): void
//    {
//        $this->output->enable();
//    }
//
//
//    public function undo(): void
//    {
//        $this->output->disable();
//    }
//}
//
//$output = new Output();
//
//$invoker = new Invoker();
//$massage = new Message($output);
//$changerStatus = new ChangerStatus($output);
//$changerStatus->undo();
//
//
//$massage->execute();
//
//
//var_dump($output->getBody());
//
////todo смысл данного кода чтобы можно было выкл или включить код. и сделать отдельный класс с действием(командой)
//// а так паттерн команд используется для группировки действий
//
////refactoring.guru
//
//
///**
// * Интерфейс Команды объявляет метод для выполнения команд.
// */
//interface Command
//{
//    public function execute(): void;
//}
//
///**
// * Некоторые команды способны выполнять простые операции самостоятельно.
// */
//class SimpleCommand implements Command
//{
//    private $payload;
//
//    public function __construct(string $payload)
//    {
//        $this->payload = $payload;
//    }
//
//    public function execute(): void
//    {
//        echo "SimpleCommand: See, I can do simple things like printing (" . $this->payload . ")\n";
//    }
//}
//
///**
// * Но есть и команды, которые делегируют более сложные операции другим объектам,
// * называемым «получателями».
// */
//class ComplexCommand implements Command
//{
//    /**
//     * @var Receiver
//     */
//    private $receiver;
//
//    /**
//     * Данные о контексте, необходимые для запуска методов получателя.
//     */
//    private $a;
//
//    private $b;
//
//    /**
//     * Сложные команды могут принимать один или несколько объектов-получателей
//     * вместе с любыми данными о контексте через конструктор.
//     */
//    public function __construct(Receiver $receiver, string $a, string $b)
//    {
//        $this->receiver = $receiver;
//        $this->a = $a;
//        $this->b = $b;
//    }
//
//    /**
//     * Команды могут делегировать выполнение любым методам получателя.
//     */
//    public function execute(): void
//    {
//        echo "ComplexCommand: Complex stuff should be done by a receiver object.\n";
//        $this->receiver->doSomething($this->a);
//        $this->receiver->doSomethingElse($this->b);
//    }
//}
//
///**
// * Классы Получателей содержат некую важную бизнес-логику. Они умеют выполнять
// * все виды операций, связанных с выполнением запроса. Фактически, любой класс
// * может выступать Получателем.
// */
//class Receiver
//{
//    public function doSomething(string $a): void
//    {
//        echo "Receiver: Working on (" . $a . ".)\n";
//    }
//
//    public function doSomethingElse(string $b): void
//    {
//        echo "Receiver: Also working on (" . $b . ".)\n";
//    }
//}
//
///**
// * Отправитель связан с одной или несколькими командами. Он отправляет запрос
// * команде.
// */
//class Invoker
//{
//    /**
//     * @var Command
//     */
//    private $onStart;
//
//    /**
//     * @var Command
//     */
//    private $onFinish;
//
//    /**
//     * Инициализация команд.
//     */
//    public function setOnStart(Command $command): void
//    {
//        $this->onStart = $command;
//    }
//
//    public function setOnFinish(Command $command): void
//    {
//        $this->onFinish = $command;
//    }
//
//    /**
//     * Отправитель не зависит от классов конкретных команд и получателей.
//     * Отправитель передаёт запрос получателю косвенно, выполняя команду.
//     */
//    public function doSomethingImportant(): void
//    {
//        echo "Invoker: Does anybody want something done before I begin?\n";
//        if ($this->onStart instanceof Command) {
//            $this->onStart->execute();
//        }
//
//        echo "Invoker: ...doing something really important...\n";
//
//        echo "Invoker: Does anybody want something done after I finish?\n";
//        if ($this->onFinish instanceof Command) {
//            $this->onFinish->execute();
//        }
//    }
//}
//
///**
// * Клиентский код может параметризовать отправителя любыми командами.
// */
//$invoker = new Invoker();
//$invoker->setOnStart(new SimpleCommand("Say Hi!"));
//$receiver = new Receiver();
//$invoker->setOnFinish(new ComplexCommand($receiver, "Send email", "Save report"));
//
//$invoker->doSomethingImportant();
//
