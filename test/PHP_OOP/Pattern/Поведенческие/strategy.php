<?php
//
//interface Definer
//{
//    public function define($arg): string;
//}
//
//class Data
//{
//    private Definer $definer;
//    private int|string|bool $arguments;
//
//    /**
//     * @param  Definer  $definer
//     */
//    public function __construct(Definer $definer)
//    {
//        $this->definer = $definer;
//    }
//
//    /**
//     * @param  bool|int|string  $arguments
//     */
//    public function setArguments(bool|int|string $arguments): void
//    {
//        $this->arguments = $arguments;
//    }
//
//    public function executeStrategy(): string
//    {
//        return $this->definer->define($this->arguments);
//    }
//}
//
//class IntDefiner implements Definer
//{
//
//    public function define($arg): string
//    {
//        return $arg.'from int strategy';
//    }
//}
//
//class StringDefiner implements Definer
//{
//
//    public function define($arg): string
//    {
//        return $arg.'from str strategy';
//    }
//}
//
//class BooleanDefiner implements Definer
//{
//
//    public function define($arg): string
//    {
//        return $arg.'from bool strategy';
//    }
//}
//
//$data = new Data(new IntDefiner());
//
//$data->setArguments('some');
//
//var_dump($data->executeStrategy());
//
