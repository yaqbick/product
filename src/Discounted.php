<?php
namespace Zadanie3;

class Discounted implements IProduct
{
    protected $name;
    protected $money;
    protected $discount;

    public function __construct(Product $product, int $discount)
    {
        $this->name =$product->getName();
        $this->money =$product->getPrice();
        $this->discount = $discount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        $this->money = ($this->money/$this->discount)*100;
        return $this->money;
    }
}