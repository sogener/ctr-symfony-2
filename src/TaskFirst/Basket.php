<?php

namespace Sogener\Crt\TaskFirst;

/**
 * Класс для работы с корзиной
 */
class Basket
{
    /**
     * @var array
     */
    private array $position;

    public function __construct()
    {
        $this->position = [];
    }

    /**
     * @param Product $product
     * @param $quantity
     * @return array
     */
    public function addProduct(Product $product, $quantity): array
    {
        $productName = $product->getName();
        $productPrice = $product->getPrice();

        return $this->position[$productName] = ['price' => $productPrice, 'quantity' => $quantity];

    }

    /**
     * @return mixed
     */
    public function getPrice(): mixed
    {
        $totalPrice = 0;
        foreach ($this->position as $value) {
            $totalPrice += current($value);
        }

        return $totalPrice;
    }

    /**
     * Выводит или возвращает информацию о корзине в виде строки
     */
    public function describe(): string
    {

        $result = '';
        foreach ($this->position as $key => $value) {
            $result .= "Имя товара: {$key} - Цена одной  позиции: {$value['price']} - Количество {$value['quantity']}.\n";
        }
        return $result;

    }


}