<?php
namespace Zadanie3;
use Money\Money;
use Exception;

class Bundle implements IProduct
{
    protected $name;
    protected $money;

    public function __construct(string $name,Product $product)
    {
        $this->name = $name;
        $this->money = $product->getPrice();
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
        if($this->money->isSameCurrency($product->getPrice()))
        {
            $this->money = $this->getPrice()->add($product->getPrice());
        }
        else
        {
            throw new Exception($amount . 'Currency must be the same for both products!');
        }
    }
}