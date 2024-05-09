<?php
//
//class Memento
//{
//    private state $state;
//
//    /**
//     * @param  State  $state
//     */
//    public function __construct(State $state)
//    {
//        $this->state = $state;
//    }
//
//    /**
//     * @return State
//     */
//    public function getState(): State
//    {
//        return $this->state;
//    }
//
//
//}
//
//class State
//{
//    public const CREATED = 'created';
//    public const PROCESING = 'PROCESING';
//    public const TEST = 'TEST';
//    public const DONE = 'DONE';
//    private string $state;
//
//    /**
//     * @param  string  $state
//     */
//    public function __construct(string $state)
//    {
//        $this->state = $state;
//    }
//
//    public function __toString(): string
//    {
//        return $this->state;
//    }
//}
//
//class Task
//{
//
//    //TODO: ДУБЛИРУЕМ ОБЪЕКТ ЧЕРЕЗ КОНСТРУКТОР
//    private State $state;
//
//    public function create()
//    {
//        $this->state = new State(State::CREATED);
//    }
//
//    public function process()
//    {
//        $this->state = new State(State::PROCESING);
//    }
//
//    public function test()
//    {
//        $this->state = new State(State::TEST);
//    }
//
//    public function done()
//    {
//        $this->state = new State(State::DONE);
//    }
//
//    public function saveToMemento()
//    {
//        return new Memento($this->state);
//    }
//
//    public function restore(Memento $memento)
//    {
//        $this->state = $memento->getState();
//    }
//
//    public function getState(): State
//    {
//     return $this->state;
//    }
//}
//
//$task = new Task();
//
//$task->create();
//
//$memento = $task->saveToMemento();
//
//var_dump($task->getState() === $memento->getState());
//
