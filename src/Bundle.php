<?php
namespace Zadanie3;
use Money\Money;
use Exception;

class Bundle implements IProduct
{
    protected $name;
    protected $money;
    protected $items;

    public function __construct(string $name,IProduct $product)
    {
        $this->name = $name;
        $this->money = $product->getPrice();
        $this->items = [$product];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->money;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addProduct(IProduct $product)
    {
        if($this->money->isSameCurrency($product->getPrice()))
        {
            array_push($this->items,$product); 
            $this->money = $this->getPrice()->add($product->getPrice());
        }
        else
        {
            throw new Exception($amount . 'Currency must be the same for both products!');
        }
    }
}