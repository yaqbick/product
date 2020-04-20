<?php
require(__DIR__.'/vendor/autoload.php');
include(__DIR__.'/vendor/moneyphp/money/src/Money.php');
use Zadanie3\Product;
use Zadanie3\Bundle;



$product1 = new Product("produkt 1", Money::PLN(10000));
$product2 = new Product("produkt 2", Money::PLN(10000));
$bundle1 = new Bundle('zestaw 1');
$bundle1->addProduct($product1);
$totalPrice = Money::PLN(0);


$products = [
    $product1,
    $product2,
    $bundle1
];

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
    
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo $totalPrice; 