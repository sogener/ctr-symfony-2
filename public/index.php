<?php

use Sogener\Crt\TaskFirst\Basket;
use Sogener\Crt\TaskFirst\Order;
use Sogener\Crt\TaskFirst\Product;

include '../vendor/autoload.php';


$basket = new Basket();

// Инициализация 1-го товара
$productName = 'item1';
$productPrice = 100;

$product = new Product($productName, $productPrice);

$quantity = 10;
$basket->addProduct($product, $quantity);

unset($productName, $productPrice, $product, $quantity);


// Инициализация 2-го товара
$productName = 'item2';
$productPrice = 200;

$product = new Product($productName, $productPrice);

$quantity = 20;
$basket->addProduct($product, $quantity);

// Результат
$totalPrice = $basket->getPrice();
$result = "Заказ на сумму: {$totalPrice}. Состав: {$basket->describe()}";
echo $result;
