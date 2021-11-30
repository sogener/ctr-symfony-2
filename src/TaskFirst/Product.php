<?php

namespace Sogener\Crt\TaskFirst;

/**
 * Класс для работы с товарами
 */
class Product
{
    private $name;
    private $price;

    /**
     * @param $name
     * @param $price
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


}