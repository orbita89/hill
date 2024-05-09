<?php
//
//interface Formatter
//{
//    public function format($str): string;
//}
//
//class SimpleText implements Formatter
//{
//    public function format($str): string
//    {
//        return $str;
//    }
//}
//
//class HTMLText implements Formatter
//{
//    public function format($str): string
//    {
//        return "<p>$str</p>";
//    }
//}
//
//abstract class BridgeService
//{
//    public Formatter $formatter;
//
//    /**
//     * @param  Formatter  $formatter
//     */
//    public function __construct(Formatter $formatter)
//    {
//        $this->formatter = $formatter;
//    }
//
//    /**
//     * @return Formatter
//     * @todo Здесь как раз идёт реализация моста
//     */
//    abstract public function getFormatter($str): string|Formatter;
//}
//
//class SimpleTextService extends BridgeService
//{
//
//    public function getFormatter($str): string|Formatter
//    {
//        return $this->formatter->format($str);
//    }
//}
//
//
//class HTNLTextService extends BridgeService
//{
//    public function getFormatter(
//        $str
//    ): string|Formatter {
//        return $this->formatter->format($str);
//    }
//}
//
//$simpleText = new SimpleText();
//$htmlText = new HtmlText();
//
//$simpleTextService = new SimpleTextService($simpleText);
//$htmlTextService = new HTNLTextService($htmlText);
//
//var_dump($simpleTextService->getFormatter('text'));
//var_dump($htmlTextService->getFormatter('html'));
//
////refactoring.guru пример
//
///**
// * Абстракция устанавливает интерфейс для «управляющей» части двух иерархий
// * классов. Она содержит ссылку на объект из иерархии Реализации и делегирует
// * ему всю настоящую работу.
// */
//class Abstraction
//{
//    /**
//     * @var Implementation
//     */
//    protected $implementation;
//
//    public function __construct(Implementation $implementation)
//    {
//        $this->implementation = $implementation;
//    }
//
//    public function operation(): string
//    {
//        return "Abstraction: Base operation with:\n" .
//            $this->implementation->operationImplementation();
//    }
//}
//
///**
// * Можно расширить Абстракцию без изменения классов Реализации.
// */
//class ExtendedAbstraction extends Abstraction
//{
//    public function operation(): string
//    {
//        return "ExtendedAbstraction: Extended operation with:\n" .
//            $this->implementation->operationImplementation();
//    }
//}
//
///**
// * Реализация устанавливает интерфейс для всех классов реализации. Он не должен
// * соответствовать интерфейсу Абстракции. На практике оба интерфейса могут быть
// * совершенно разными. Как правило, интерфейс Реализации предоставляет только
// * примитивные операции, в то время как Абстракция определяет операции более
// * высокого уровня, основанные на этих примитивах.
// */
//interface Implementation
//{
//    public function operationImplementation(): string;
//}
//
///**
// * Каждая Конкретная Реализация соответствует определённой платформе и реализует
// * интерфейс Реализации с использованием API этой платформы.
// */
//class ConcreteImplementationA implements Implementation
//{
//    public function operationImplementation(): string
//    {
//        return "ConcreteImplementationA: Here's the result on the platform A.\n";
//    }
//}
//
//class ConcreteImplementationB implements Implementation
//{
//    public function operationImplementation(): string
//    {
//        return "ConcreteImplementationB: Here's the result on the platform B.\n";
//    }
//}
//
///**
// * За исключением этапа инициализации, когда объект Абстракции связывается с
// * определённым объектом Реализации, клиентский код должен зависеть только от
// * класса Абстракции. Таким образом, клиентский код может поддерживать любую
// * комбинацию абстракции и реализации.
// */
//function clientCode(Abstraction $abstraction)
//{
//    // ...
//
//    echo $abstraction->operation();
//
//    // ...
//}
//
///**
// * Клиентский код должен работать с любой предварительно сконфигурированной
// * комбинацией абстракции и реализации.
// */
//$implementation = new ConcreteImplementationA();
//$abstraction = new Abstraction($implementation);
//clientCode($abstraction);
//
//echo "\n";
//
//$implementation = new ConcreteImplementationB();
//$abstraction = new ExtendedAbstraction($implementation);
//clientCode($abstraction);
//
////пример из реальной жизни
//
//
///**
// * Абстракция.
// */
//abstract class Page
//{
//    /**
//     * @var Renderer
//     */
//    protected $renderer;
//
//    /**
//     * Обычно Абстракция инициализируется одним из объектов Реализации.
//     */
//    public function __construct(Renderer $renderer)
//    {
//        $this->renderer = $renderer;
//    }
//
//    /**
//     * Паттерн Мост позволяет динамически заменять присоединённый объект
//     * Реализации.
//     */
//    public function changeRenderer(Renderer $renderer): void
//    {
//        $this->renderer = $renderer;
//    }
//
//    /**
//     * Поведение «вида» остаётся абстрактным, так как оно предоставляется только
//     * классами Конкретной Абстракции.
//     */
//    abstract public function view(): string;
//}
//
///**
// * Эта Конкретная Абстракция создаёт простую страницу.
// */
//class SimplePage extends Page
//{
//    protected $title;
//    protected $content;
//
//    public function __construct(Renderer $renderer, string $title, string $content)
//    {
//        parent::__construct($renderer);
//        $this->title = $title;
//        $this->content = $content;
//    }
//
//    public function view(): string
//    {
//        return $this->renderer->renderParts([
//            $this->renderer->renderHeader(),
//            $this->renderer->renderTitle($this->title),
//            $this->renderer->renderTextBlock($this->content),
//            $this->renderer->renderFooter()
//        ]);
//    }
//}
//
///**
// * Эта Конкретная Абстракция создаёт более сложную страницу.
// */
//class ProductPage extends Page
//{
//    protected $product;
//
//    public function __construct(Renderer $renderer, Product $product)
//    {
//        parent::__construct($renderer);
//        $this->product = $product;
//    }
//
//    public function view(): string
//    {
//        return $this->renderer->renderParts([
//            $this->renderer->renderHeader(),
//            $this->renderer->renderTitle($this->product->getTitle()),
//            $this->renderer->renderTextBlock($this->product->getDescription()),
//            $this->renderer->renderImage($this->product->getImage()),
//            $this->renderer->renderLink("/cart/add/".$this->product->getId(), "Add to cart"),
//            $this->renderer->renderFooter()
//        ]);
//    }
//}
//
///**
// * Вспомогательный класс для класса ProductPage.
// */
//class Product
//{
//    private $id, $title, $description, $image, $price;
//
//    public function __construct(
//        string $id,
//        string $title,
//        string $description,
//        string $image,
//        Float $price
//    ) {
//        $this->id = $id;
//        $this->title = $title;
//        $this->description = $description;
//        $this->image = $image;
//        $this->price = $price;
//    }
//
//    public function getId(): string
//    {
//        return $this->id;
//    }
//
//    public function getTitle(): string
//    {
//        return $this->title;
//    }
//
//    public function getDescription(): string
//    {
//        return $this->description;
//    }
//
//    public function getImage(): string
//    {
//        return $this->image;
//    }
//
//    public function getPrice(): Float
//    {
//        return $this->price;
//    }
//}
//
//
///**
// * Реализация объявляет набор «реальных», «под капотом», «платформенных»
// * методов.
// *
// * В этом случае Реализация перечисляет методы рендеринга, которые используются
// * для создания веб-страниц. Разные Абстракции могут использовать разные методы
// * Реализации.
// */
//interface Renderer
//{
//    public function renderTitle(string $title): string;
//
//    public function renderTextBlock(string $text): string;
//
//    public function renderImage(string $url): string;
//
//    public function renderLink(string $url, string $title): string;
//
//    public function renderHeader(): string;
//
//    public function renderFooter(): string;
//
//    public function renderParts(array $parts): string;
//}
//
///**
// * Эта Конкретная Реализация отображает веб-страницу в виде HTML.
// */
//class HTMLRenderer implements Renderer
//{
//    public function renderTitle(string $title): string
//    {
//        return "<h1>$title</h1>";
//    }
//
//    public function renderTextBlock(string $text): string
//    {
//        return "<div class='text'>$text</div>";
//    }
//
//    public function renderImage(string $url): string
//    {
//        return "<img src='$url'>";
//    }
//
//    public function renderLink(string $url, string $title): string
//    {
//        return "<a href='$url'>$title</a>";
//    }
//
//    public function renderHeader(): string
//    {
//        return "<html><body>";
//    }
//
//    public function renderFooter(): string
//    {
//        return "</body></html>";
//    }
//
//    public function renderParts(array $parts): string
//    {
//        return implode("\n", $parts);
//    }
//}
//
///**
// * Эта Конкретная Реализация отображает веб-страницу в виде строк JSON.
// */
//class JsonRenderer implements Renderer
//{
//    public function renderTitle(string $title): string
//    {
//        return '"title": "'.$title.'"';
//    }
//
//    public function renderTextBlock(string $text): string
//    {
//        return '"text": "'.$text.'"';
//    }
//
//    public function renderImage(string $url): string
//    {
//        return '"img": "'.$url.'"';
//    }
//
//    public function renderLink(string $url, string $title): string
//    {
//        return '"link": {"href": "'.$url.'", "title": "'.$title.'"}';
//    }
//
//    public function renderHeader(): string
//    {
//        return '';
//    }
//
//    public function renderFooter(): string
//    {
//        return '';
//    }
//
//    public function renderParts(array $parts): string
//    {
//        return "{\n".implode(",\n", array_filter($parts))."\n}";
//    }
//}
//
///**
// * Клиентский код имеет дело только с объектами Абстракции.
// */
//function clientCode1(Page $page)
//{
//    // ...
//
//    echo $page->view();
//    // ...
//}
//
///**
// * Клиентский код может выполняться с любой предварительно сконфигурированной
// * комбинацией Абстракция+Реализация.
// */
//$HTMLRenderer = new HTMLRenderer();
//$JSONRenderer = new JsonRenderer();
//
//$page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
//echo "HTML view of a simple content page:\n";
//clientCode1($page);
//echo "\n\n";
//
///**
// * При необходимости Абстракция может заменить связанную Реализацию во время
// * выполнения.
// */
//$page->changeRenderer($JSONRenderer);
//echo "JSON view of a simple content page, rendered with the same client code:\n";
//clientCode1($page);
//echo "\n\n";
//
//
//$product = new Product(
//    "123", "Star Wars, episode1",
//    "A long time ago in a galaxy far, far away...",
//    "/images/star-wars.jpeg", 39.95
//);
//
//$page = new ProductPage($HTMLRenderer, $product);
//echo "HTML view of a product page, same client code:\n";
//clientCode1($page);
//echo "\n\n";
//
//$page->changeRenderer($JSONRenderer);
//echo "JSON view of a simple content page, with the same client code:\n";
//clientCode1($page);