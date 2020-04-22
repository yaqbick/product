<?php
require(__DIR__.'/vendor/autoload.php');
use Zadanie3\Product;
use Zadanie3\Bundle;
use Zadanie3\Discounted;
use Money\Money;

$product1 = new Product("produkt 1", Money::EUR(10000));
$product2 = new Product("produkt 2",Money::EUR(10000));
$discounted1 = new Discounted($product1,30);
$discounted2 = new Discounted($product2,50);
$bundle1 = new Bundle('zestaw 1',$discounted1);
$bundle1->addProduct($discounted2);
$discounted3 = new Discounted($bundle1,60);
$totalPrice = Money::EUR(0);

$products = [
    $product1,
    $product2,
    $bundle1,
    $discounted1,
    $discounted2,
    $discounted3
];

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
    echo $product->getPrice()->getAmount() . PHP_EOL;
    
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo "total price: ".$totalPrice->getAmount(). PHP_EOL; 
// $items =  $bundle1->getItems();
// foreach ($items as $item)
// {
//     echo $item->getName(). PHP_EOL;
// }