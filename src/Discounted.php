<?php

namespace Zadanie3;

use Money\Money;
use Exception;

class Discounted implements IProduct
{
    protected $product;
    protected $discount;

    public function __construct(IProduct $product, float $discount)
    {
        if ($discount <= 0 || $discount > 100 ) {
            throw new Exception($discount . 'Discount must be greater than 0 and smaller than 100');
        }
        $this->product = $product;
        $this->discount = (100-$discount)/100;
    }

    public function getName(): string
    {
        return $this->product->getName();
    }

    public function getPrice(): Money
    {
        return ($this->product->getPrice())->multiply($this->discount);
    }
}
