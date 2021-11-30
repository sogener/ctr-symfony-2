<?php

namespace Sogener\Crt\TaskFirst;

/**
 * Класс для работы с заказами
 */
class Order
{
    /**
     * @var
     */
    private $basket;
    /**
     * @var
     */
    private $price;

    /**
     * @param $basket
     * @param $price
     */
    public function __construct($basket, $price)
    {
        $this->basket = $basket;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}