<?php

interface  specification
{
    public function isNormal(Pupil $pupil): bool;
}

class Pupil
{
    private int $rate = 0;

    /**
     * @param  int  $rate
     */
    public function __construct(int $rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param  int  $rate
     */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }
}

class PupilSpecification implements Specification
{
    private int $needRate = 0;

    /**
     * @param  int  $needRate
     */
    public function __construct(int $needRate)
    {
        $this->needRate = $needRate;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return $this->needRate < $pupil->getRate();
    }
}

class AndSpecification implements Specification
{

    private array $specification;

    /**
     * @param  array  $specification
     */
    public function __construct(Specification ...$specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification) {
            if (!$specification->isNormal($pupil)) {
                return false;
            }
        }

        return true;
    }
}

class OrSpecification implements Specification
{

    private array $specification;

    /**
     * @param  array  $specification
     */
    public function __construct(Specification ...$specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification) {
            if ($specification->isNormal($pupil)) {
                return true;
            }
        }

        return false;
    }
}

class NotSpecification implements Specification
{
    private Specification $specification;

    /**
     * @param  specification  $specification
     */
    public function __construct(specification $specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return $this->specification->isNormal($pupil);
    }
}

$spec1 = new PupilSpecification(5);
$spec2 = new PupilSpecification(10);

$pupil = new Pupil(8);


$andSpecification = new AndSpecification($spec1, $spec2);
$orSpecification = new orSpecification($spec1, $spec2);
$notSpecification = new NotSpecification($spec1);

var_dump($andSpecification->isNormal($pupil));
var_dump($orSpecification->isNormal($pupil));
var_dump($notSpecification->isNormal($pupil));
var_dump($spec1->isNormal($pupil));



//todo спецификации очень похож на интерпретатор отличается реализации так же здесь можно добавить две реализации в один объект