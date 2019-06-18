<?php

namespace DeliveryBundle\Entity;

use CommonBundle\Entity\Product\Product;

/**
 * Class Delivery
 * @package DeliveryBundle\Entity
 */
class Delivery
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $address;

    /** @var Product[] */
    public $products;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Delivery
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Delivery
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return Delivery
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}