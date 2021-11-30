<?php

namespace Sogener\Crt\TaskFirst;

/**
 * Позиция одного товара в корзине
 */
class BasketPosition
{
    private $name;
    private $amount;

    /**
     * @param $name
     * @param $amount
     */
    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->amount;
    }

    /**
     *
     */
    public function getPrice()
    {
    }


}