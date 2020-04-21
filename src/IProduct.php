<?php
namespace Zadanie3;
use Money\Money;
interface IProduct
{
    public function getName(): string;
    
    public function getPrice(): Money;
}