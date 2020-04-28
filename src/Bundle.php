<?php

namespace Zadanie3;

use Money\Money;
use Exception;

class Bundle implements IProduct
{
    protected $name;
    /** @var IProduct[] */
    protected $items;
    /** @var Money */
    protected $totalValue;

    public function __construct(string $name, array $products)
    {
        $this->name = $name;
        //todo: obsłuzenie czy produkty maja ta sama walute
        foreach ($products as $product) {
            if($product instanceof IProduct){
                $this->items []= $product;
            } else {
                throw new Exception('');
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->totalValue;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addProduct(IProduct $product)
    {
        if($this->totalValue->isSameCurrency($product->getPrice()))
        {
            array_push($this->items,$product); //zmiana na operator []=
            $this->totalValue->add($product->getPrice());
        } else {
            throw new Exception( 'Currency must be the same for both products!');
        }
    }
}
