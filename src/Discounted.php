<?php
namespace Zadanie3;
use Money\Money;
use Exception;


class Discounted implements IProduct
{
    protected $name;
    protected $money;
    protected $discount;

    public function __construct(Product $product, float $discount)
    {
        if ($discount <= 0 || $discount > 100 ) {
            throw new Exception($amount . 'Discount must be greater than 0 and smaller than 100');
        }
        $this->name =$product->getName().' with discount '.$discount.'%';
        $this->money =$product->getPrice();
        $this->discount = (100-$discount)/100;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        $this->money = $this->money->multiply($this->discount);
        return $this->money;
    }
}