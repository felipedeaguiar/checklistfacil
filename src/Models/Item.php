<?php
namespace Checklist\Models;

class Item
{
    protected $id;
    protected $price;
    protected $quant;

    public function __construct(int $id, int $quant, float $price){
        $this->id = $id;
        $this->quant = $quant;
        $this->price = $price;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuant(): int
    {
        return $this->quant;
    }

    /**
     * @param mixed $quant
     */
    public function setQuant(int $quant)
    {
        $this->quant = $quant;
    }
}