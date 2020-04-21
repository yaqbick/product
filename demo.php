<?php
require(__DIR__.'/vendor/autoload.php');
use Zadanie3\Product;
use Zadanie3\Bundle;
use Zadanie3\Discounted;
use Money\Money;

$product1 = new Product("produkt 1", Money::EUR(10000));
$product2 = new Product("produkt 2",Money::EUR(10000));
$bundle1 = new Bundle('zestaw 1',$product1);
$bundle1->addProduct($product2);
$discounted1 = new Discounted($product1,30);
$discounted2 = new Discounted($product2,60);
$totalPrice = Money::EUR(0);

$products = [
    $product1,
    $product2,
    $bundle1,
    $discounted1,
    $discounted2
];

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
    
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo "total price: ".$totalPrice->getAmount(); 