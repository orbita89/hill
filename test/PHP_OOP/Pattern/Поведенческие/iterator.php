<?php
//
//
//class WordList
//{
//
//    private array $list = array();
//    private int $index = 0;
//
//    /**
//     * @return array
//     */
//    public function getList(): array
//    {
//        return $this->list;
//    }
//
//    /**
//     * @param  array  $list
//     */
//    public function setList(array $list): void
//    {
//        $this->list = $list;
//    }
//
//    /**
//     * @return int
//     */
//    public function getIndex(): int
//    {
//        return $this->index;
//    }
//
//    /**
//     * @param  int  $index
//     */
//    public function setIndex(int $index): void
//    {
//        $this->index = $index;
//    }
//
//    public function getItem($key): ?Worker
//    {
//        if ($this->list[$key]) {
//            return $key;
//        }
//        return null;
//    }
//
//    public function next()
//    {
//        if ($this->index < count($this->list)) {
//            $this->index++;
//        }
//    }
//
//    public function prev()
//    {
//        if ($this->index !== 0) {
//            $this->index--;
//        }
//    }
//
//    public function getByIndex(): Worker
//    {
//        return $this->list[$this->index];
//    }
//
//    //сюда можно добавить еще условия что-бы использовать в обходе
//}
//
//class  Worker
//{
//    private string $name = '';
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public function setName(string $name): void
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public function __construct(string $name)
//    {
//        $this->name = $name;
//    }
//}
//
//$worker = new Worker( '1');
//$worker2 = new Worker( '2');
//$worker3 = new Worker( '3');
//
//var_dump($workerList = new WordList());
//
//$workerList->setList([$worker, $worker2, $worker3]);
//$workerList->next();
////todo обход с помощью next
//var_dump($workerList->getByIndex()->getName());
//
////refactoring.guru
//
///**
// * Конкретные Итераторы реализуют различные алгоритмы обхода. Эти классы
// * постоянно хранят текущее положение обхода.
// */
//class AlphabeticalOrderIterator implements \Iterator
//{
//    /**
//     * @var WordsCollection
//     */
//    private $collection;
//
//    /**
//     * @var int Хранит текущее положение обхода. У итератора может быть
//     * множество других полей для хранения состояния итерации, особенно когда он
//     * должен работать с определённым типом коллекции.
//     */
//    private $position = 0;
//
//    /**
//     * @var bool Эта переменная указывает направление обхода.
//     */
//    private $reverse = false;
//
//    public function __construct($collection, $reverse = false)
//    {
//        $this->collection = $collection;
//        $this->reverse = $reverse;
//    }
//
//    public function rewind()
//    {
//        $this->position = $this->reverse ?
//            count($this->collection->getItems()) - 1 : 0;
//    }
//
//    public function current()
//    {
//        return $this->collection->getItems()[$this->position];
//    }
//
//    public function key()
//    {
//        return $this->position;
//    }
//
//    public function next()
//    {
//        $this->position = $this->position + ($this->reverse ? -1 : 1);
//    }
//
//    public function valid()
//    {
//        return isset($this->collection->getItems()[$this->position]);
//    }
//}
//
///**
// * Конкретные Коллекции предоставляют один или несколько методов для получения
// * новых экземпляров итератора, совместимых с классом коллекции.
// */
//class WordsCollection implements \IteratorAggregate
//{
//    private $items = [];
//
//    public function getItems()
//    {
//        return $this->items;
//    }
//
//    public function addItem($item)
//    {
//        $this->items[] = $item;
//    }
//
//    public function getIterator(): Iterator
//    {
//        return new AlphabeticalOrderIterator($this);
//    }
//
//    public function getReverseIterator(): Iterator
//    {
//        return new AlphabeticalOrderIterator($this, true);
//    }
//}
//
///**
// * Клиентский код может знать или не знать о Конкретном Итераторе или классах
// * Коллекций, в зависимости от уровня косвенности, который вы хотите сохранить в
// * своей программе.
// */
//$collection = new WordsCollection();
//$collection->addItem("First");
//$collection->addItem("Second");
//$collection->addItem("Third");
//
//echo "Straight traversal:\n";
//foreach ($collection->getIterator() as $item) {
//    echo $item . "\n";
//}
//
//echo "\n";
//echo "Reverse traversal:\n";
//foreach ($collection->getReverseIterator() as $item) {
//    echo $item . "\n";
//}