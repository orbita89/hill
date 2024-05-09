<?php
//interface state
//{
//    public function toNext(Task $task);
//
//    public function getStatus();
//}
//
//class Task
//{
//    private state $state;
//    public static function make(): Task
//    {
//        $self = new self();
//        $self->setState(new Created());
//        return $self;
//    }
//
//    /**
//     * @return state
//     */
//    public function getState(): state
//    {
//        return $this->state;
//    }
//
//    /**
//     * @param  state  $state
//     */
//    public function setState(state $state): void
//    {
//        $this->state = $state;
//    }
//
//    public function proceedTonext()
//    {
//        $this->state->toNext($this);
//    }
//}
//
//class Created implements state
//{
//
//    public function toNext(Task $task)
//    {
//        $task->setState(new Process());
//    }
//
//    public function getStatus()
//    {
//        return 'Created';
//    }
//}
//
//class Process implements state
//{
//
//    public function toNext(Task $task)
//    {
//        $task->setState(new Test());
//    }
//
//    public function getStatus()
//    {
//        return 'Process';
//    }
//}
//
//class Test implements state
//{
//
//    public function toNext(Task $task)
//    {
//        $task->setState(new Done());
//    }
//
//    public function getStatus()
//    {
//        return 'Test';
//    }
//}
//
//class Done implements state
//{
//
//    public function toNext(Task $task)
//    {
//        // TODO: Implement toNext() method.
//    }
//
//    public function getStatus()
//    {
//        return 'Done';
//    }
//}
//
//$task = Task::make();
//$task->proceedTonext();
//
//
//var_dump($task->getState()->getStatus());