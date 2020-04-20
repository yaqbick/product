<?php
namespace Zadanie3;

class Bundle implements IProduct
{
    protected $name;
    protected $money;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->money;
    }

    public function addProduct(Product $product)
    {
        $this->money->add($product->getPrice());
    }
}