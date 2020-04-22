<?php
namespace Zadanie3;
use Money\Money;
use Exception;


class Discounted implements IProduct
{
    protected $name;
    protected $money;
    protected $discount;

    public function __construct(IProduct $product, float $discount)
    {
        if ($discount <= 0 || $discount > 100 ) {
            throw new Exception($amount . 'Discount must be greater than 0 and smaller than 100');
        }
        $this->name = $product->getName();
        $this->discount = (100-$discount)/100;
        $this->calculateDiscount($product->getPrice());
   
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->money;
    }

    public function calculateDiscount(Money $money): void
    {
        $this->money = $money->multiply($this->discount);
    }
}