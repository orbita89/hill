<?php
//
//interface WorkerVisitor
//{
//    public function visitDeveloper(Worker $worker);
//
//    public function visitDesigner(Worker $worker);
//}
//
//interface Worker
//{
//    public function work();
//
//    public function accept(WorkerVisitor $worker);
//}
//
//class RecorderVisitor implements WorkerVisitor
//{
//    private array $visitors = array();
//
//    /**
//     * @return array
//     */
//    public function getVisitors(): array
//    {
//        return $this->visitors;
//    }
//
//    public function visitDeveloper(Worker $worker)
//    {
//        $this->visitors[] = $worker;
//    }
//
//    public function visitDesigner(Worker $worker)
//    {
//        $this->visitors[] = $worker;
//    }
//}
//
//class Developer implements Worker
//{
//    public function accept(WorkerVisitor $worker)
//    {
//        $worker->visitDeveloper($this);
//    }
//
//    public function work()
//    {
//        printf('dev is worker');
//    }
//}
//
//class Designer implements Worker
//{
//    public function accept(WorkerVisitor $worker)
//    {
//        $worker->visitDesigner($this);
//    }
//
//    public function work()
//    {
//        printf('des is worker');
//    }
//}
//
//$visitor = new RecorderVisitor();
//
//$developer = new Developer();
//$designer = new Designer();
//
//$developer->accept($visitor);
//$designer->accept($visitor);
//
//var_dump($visitor->getVisitors());
//
////todo смысл этого шаблона что у нас есть разные хранилища и потом просто можно их просто использовать
//
////refactoring.guru
//
//
///**
// * Интерфейс Компонента объявляет метод accept, который в качестве аргумента
// * может получать любой объект, реализующий интерфейс посетителя.
// */
//interface Component
//{
//    public function accept(Visitor $visitor): void;
//}
//
///**
// * Каждый Конкретный Компонент должен реализовать метод accept таким образом,
// * чтобы он вызывал метод посетителя, соответствующий классу компонента.
// */
//class ConcreteComponentA implements Component
//{
//    /**
//     * Обратите внимание, мы вызываем visitConcreteComponentA, что соответствует
//     * названию текущего класса. Таким образом мы позволяем посетителю узнать, с
//     * каким классом компонента он работает.
//     */
//    public function accept(Visitor $visitor): void
//    {
//        $visitor->visitConcreteComponentA($this);
//    }
//
//    /**
//     * Конкретные Компоненты могут иметь особые методы, не объявленные в их
//     * базовом классе или интерфейсе. Посетитель всё же может использовать эти
//     * методы, поскольку он знает о конкретном классе компонента.
//     */
//    public function exclusiveMethodOfConcreteComponentA(): string
//    {
//        return "A";
//    }
//}
//
//class ConcreteComponentB implements Component
//{
//    /**
//     * То же самое здесь: visitConcreteComponentB => ConcreteComponentB
//     */
//    public function accept(Visitor $visitor): void
//    {
//        $visitor->visitConcreteComponentB($this);
//    }
//
//    public function specialMethodOfConcreteComponentB(): string
//    {
//        return "B";
//    }
//}
//
///**
// * Интерфейс Посетителя объявляет набор методов посещения, соответствующих
// * классам компонентов. Сигнатура метода посещения позволяет посетителю
// * определить конкретный класс компонента, с которым он имеет дело.
// */
//interface Visitor
//{
//    public function visitConcreteComponentA(ConcreteComponentA $element): void;
//
//    public function visitConcreteComponentB(ConcreteComponentB $element): void;
//}
//
///**
// * Конкретные Посетители реализуют несколько версий одного и того же алгоритма,
// * которые могут работать со всеми классами конкретных компонентов.
// *
// * Максимальную выгоду от паттерна Посетитель вы почувствуете, используя его со
// * сложной структурой объектов, такой как дерево Компоновщика. В этом случае
// * было бы полезно хранить некоторое промежуточное состояние алгоритма при
// * выполнении методов посетителя над различными объектами структуры.
// */
//class ConcreteVisitor1 implements Visitor
//{
//    public function visitConcreteComponentA(ConcreteComponentA $element): void
//    {
//        echo $element->exclusiveMethodOfConcreteComponentA() . " + ConcreteVisitor1\n";
//    }
//
//    public function visitConcreteComponentB(ConcreteComponentB $element): void
//    {
//        echo $element->specialMethodOfConcreteComponentB() . " + ConcreteVisitor1\n";
//    }
//}
//
//class ConcreteVisitor2 implements Visitor
//{
//    public function visitConcreteComponentA(ConcreteComponentA $element): void
//    {
//        echo $element->exclusiveMethodOfConcreteComponentA() . " + ConcreteVisitor2\n";
//    }
//
//    public function visitConcreteComponentB(ConcreteComponentB $element): void
//    {
//        echo $element->specialMethodOfConcreteComponentB() . " + ConcreteVisitor2\n";
//    }
//}
//
///**
// * Клиентский код может выполнять операции посетителя над любым набором
// * элементов, не выясняя их конкретных классов. Операция принятия направляет
// * вызов к соответствующей операции в объекте посетителя.
// */
//function clientCode(array $components, Visitor $visitor)
//{
//    // ...
//    foreach ($components as $component) {
//        $component->accept($visitor);
//    }
//    // ...
//}
//
//$components = [
//    new ConcreteComponentA(),
//    new ConcreteComponentB(),
//];
//
