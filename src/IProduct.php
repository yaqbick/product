<?php
namespace Zadanie3;

interface IProduct
{
    public function getName(): string;
    
    public function getPrice(): Money;
}