<?php

//abstract class Handler
//{
//    private ?Handler $successor;
//
//    /**
//     * @param  Handler|null  $successor
//     */
//    public function __construct(?Handler $successor)
//    {
//        $this->successor = $successor;
//    }
//
//    final public function handle(TaskInterface $task)
//    {
//		$proceed =  $this->processing($task);
//        if ($proceed === null && $this->successor) {
//            $proceed = $this->successor->handle($task);
//        }
//        return $proceed;
//    }
//
//    abstract protected function processing(TaskInterface $task): ?array;
//}
//
//interface TaskInterface
//{
//    public function getArray();
//}
//
//class DevTask implements TaskInterface
//{
//    private array $arr = [1, 2, 3,];
//    public function getArray()
//    {
//        return $this->arr;
//    }
//}
//
//class Jun extends Handler
//{
//
//    protected function processing(TaskInterface $task): ?array
//    {
//        return null;
//    }
//}
//
//class Middle extends Handler
//{
//
//    protected function processing(TaskInterface $task): ?array
//    {
//        return null;
//    }
//}
//
//class Senior extends Handler
//{
//
//    protected function processing(TaskInterface $task): ?array
//    {
//        return $task->getArray();
//    }
//}
//
//$task = new DevTask();
//$senior = new Senior(null);
//$middle = new Middle($senior);
//$junior = new Jun($middle);
//
//var_dump($junior->handle($task));

//refactoring.guru пример

/**
 * Интерфейс Обработчика объявляет метод построения цепочки обработчиков. Он
 * также объявляет метод для выполнения запроса.
 */
interface Handler
{
    public function setNext(Handler $handler): Handler;

    public function handle(string $request): ?string;
}

/**
 * Поведение цепочки по умолчанию может быть реализовано внутри базового класса
 * обработчика.
 */
abstract class AbstractHandler implements Handler
{
    /**
     * @var Handler
     */
    private $nextHandler;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;
        // Возврат обработчика отсюда позволит связать обработчики простым
        // способом, вот так:
        // $monkey->setNext($squirrel)->setNext($dog);
        return $handler;
    }

    public function handle(string $request): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}

/**
 * Все Конкретные Обработчики либо обрабатывают запрос, либо передают его
 * следующему обработчику в цепочке.
 */
class MonkeyHandler extends AbstractHandler
{
    public function handle(string $request): ?string
    {
        if ($request === "Banana") {
            return "Monkey: I'll eat the ".$request.".\n";
        } else {
            return parent::handle($request);
        }
    }
}

class SquirrelHandler extends AbstractHandler
{
    public function handle(string $request): ?string
    {
        if ($request === "Nut") {
            return "Squirrel: I'll eat the ".$request.".\n";
        } else {
            return parent::handle($request);
        }
    }
}

class DogHandler extends AbstractHandler
{
    public function handle(string $request): ?string
    {
        if ($request === "MeatBall") {
            return "Dog: I'll eat the ".$request.".\n";
        } else {
            return parent::handle($request);
        }
    }
}

/**
 * Обычно клиентский код приспособлен для работы с единственным обработчиком. В
 * большинстве случаев клиенту даже неизвестно, что этот обработчик является
 * частью цепочки.
 */
function clientCode(Handler $handler)
{
    foreach (["Nut", "Banana", "Cup of coffee"] as $food) {
        echo "Client: Who wants a ".$food."?\n";
        $result = $handler->handle($food);
        if ($result) {
            echo "  ".$result;
        } else {
            echo "  ".$food." was left untouched.\n";
        }
    }
}

/**
 * Другая часть клиентского кода создает саму цепочку.
 */
$monkey = new MonkeyHandler();
$squirrel = new SquirrelHandler();
$dog = new DogHandler();

$monkey->setNext($squirrel)->setNext($dog);

/**
 * Клиент должен иметь возможность отправлять запрос любому обработчику, а не
 * только первому в цепочке.
 */
echo "Chain: Monkey > Squirrel > Dog\n\n";
clientCode($monkey);
echo "\n";

echo "Subchain: Squirrel > Dog\n\n";
clientCode($squirrel);
