<?php
//
////abstract class prototype
////{
////    protected string $name;
////    protected string $position;
////
////    /**
////     * @return string
////     */
////    public function getName(): string
////    {
////        return $this->name;
////    }
////
////    /**
////     * @param  string  $name
////     */
////    public function setName(string $name): void
////    {
////        $this->name = $name;
////    }
////
////    /**
////     * @return string
////     */
////    public function getPosition(): string
////    {
////        return $this->position;
////    }
////
////    /**
////     * @param  string  $position
////     */
////    public function setPosition(string $position): void
////    {
////        $this->position = $position;
////    }
////}
////
////class Developer extends prototype
////{
////    protected string $position = 'developer';
////}
////
////$developer = new Developer();
////
////$developerClone = clone $developer;
////
////$developerClone->setName('nameKit');
////
////var_dump($developerClone);
//
////Пример от guru
//
///**
// * Пример класса, имеющего возможность клонирования. Мы посмотрим как происходит
// * клонирование значений полей разных типов.
// */
////class Prototype
////{
////    public $primitive;
////    public $component;
////    public $circularReference;
////
////    /**
////     * PHP имеет встроенную поддержку клонирования. Вы можете «клонировать»
////     * объект без определения каких-либо специальных методов, при условии, что
////     * его поля имеют примитивные типы. Поля, содержащие объекты, сохраняют свои
////     * ссылки в клонированном объекте. Поэтому в некоторых случаях вам может
////     * понадобиться клонировать также и вложенные объекты. Это можно сделать
////     * специальным методом clone.
////     */
////    public function __clone()
////    {
////        $this->component = clone $this->component;
////
////        // Клонирование объекта, который имеет вложенный объект с обратной
////        // ссылкой, требует специального подхода. После завершения клонирования
////        // вложенный объект должен указывать на клонированный объект, а не на
////        // исходный объект.
////        $this->circularReference = clone $this->circularReference;
////        $this->circularReference->prototype = $this;
////    }
////}
////
////class ComponentWithBackReference
////{
////    public $prototype;
////
////    /**
////     * Обратите внимание, что конструктор не будет выполнен во время
////     * клонирования. Если у вас сложная логика внутри конструктора, вам может
////     * потребоваться выполнить ее также и в методе clone.
////     */
////    public function __construct(Prototype $prototype)
////    {
////        $this->prototype = $prototype;
////    }
////}
////
/////**
//// * Клиентский код.
//// */
////function clientCode()
////{
////    $p1 = new Prototype();
////    $p1->primitive = 245;
////    $p1->component = new \DateTime();
////    $p1->circularReference = new ComponentWithBackReference($p1);
////
////    $p2 = clone $p1;
////    if ($p1->primitive === $p2->primitive) {
////        echo "Primitive field values have been carried over to a clone. Yay!\n";
////    } else {
////        echo "Primitive field values have not been copied. Booo!\n";
////    }
////    if ($p1->component === $p2->component) {
////        echo "Simple component has not been cloned. Booo!\n";
////    } else {
////        echo "Simple component has been cloned. Yay!\n";
////    }
////
////    if ($p1->circularReference === $p2->circularReference) {
////        echo "Component with back reference has not been cloned. Booo!\n";
////    } else {
////        echo "Component with back reference has been cloned. Yay!\n";
////    }
////
////    if ($p1->circularReference->prototype === $p2->circularReference->prototype) {
////        echo "Component with back reference is linked to original object. Booo!\n";
////    } else {
////        echo "Component with back reference is linked to the clone. Yay!\n";
////    }
////}
////
////clientCode();
//
////Пример из реальной жизни guru
//
///**
// * Прототип.
// */
//class Page
//{
//    private $title;
//
//    private $body;
//
//    /**
//     * @var Author
//     */
//    private $author;
//
//    private $comments = [];
//
//    /**
//     * @var \DateTime
//     */
//    private $date;
//
//    // +100 приватных полей.
//
//    public function __construct(string $title, string $body, Author $author)
//    {
//        $this->title = $title;
//        $this->body = $body;
//        $this->author = $author;
//        $this->author->addToPage($this);
//        $this->date = new \DateTime();
//    }
//
//    public function addComment(string $comment): void
//    {
//        $this->comments[] = $comment;
//    }
//
//    /**
//     * Вы можете контролировать, какие данные вы хотите перенести в
//     * клонированный объект.
//     *
//     * Например, при клонировании страницы:
//     * - Она получает новый заголовок «Копия ...».
//     * - Автор страницы остаётся прежним. Поэтому мы оставляем ссылку на
//     * существующий объект, добавляя клонированную страницу в список страниц
//     * автора.
//     * - Мы не переносим комментарии со старой страницы.
//     * - Мы также прикрепляем к странице новый объект даты.
//     */
//    public function __clone()
//    {
//        $this->title = "Copy of " . $this->title;
//        $this->author->addToPage($this);
//        $this->comments = [];
//        $this->date = new \DateTime();
//    }
//}
//
//class Author
//{
//    private $name;
//
//    /**
//     * @var Page[]
//     */
//    private $pages = [];
//
//    public function __construct(string $name)
//    {
//        $this->name = $name;
//    }
//
//    public function addToPage(Page $page): void
//    {
//        $this->pages[] = $page;
//    }
//}
//
///**
// * Клиентский код.
// */
//function clientCode()
//{
//    $author = new Author("John Smith");
//    $page = new Page("Tip of the day", "Keep calm and carry on.", $author);
//
//    // ...
//
//    $page->addComment("Nice tip, thanks!");
//
//    // ...
//
//    $draft = clone $page;
//    echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
//    print_r($draft);
//}
//
//clientCode();
