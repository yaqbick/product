<?php
namespace Zadanie3;

class Product implements IProduct
{
    protected $name;
    protected $money;

    public function __construct(string $name, Money $money)
    {
        $this->name = $name;
        $this->money = $money;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->money;
    }

}
