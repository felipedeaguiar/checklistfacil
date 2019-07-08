<?php
namespace Checklist\Models;

class Customer
{
   protected $id;
   protected $cnpj;
   protected $name;
   protected $businessArea;

    public function __construct(int $id, String $cnpj, String $name, String $businessArea)
    {
        $this->id = $id;
        $this->cnpj = $cnpj;
        $this->name = $name;
        $this->businessArea = $businessArea;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @param String $businessArea
     */
    public function setBusinessArea(String $businessArea)
    {
        $this->businessArea = $businessArea;
    }

    /**
     * @return String
     */
    public function getBusinessArea(): String
    {
        return $this->businessArea;
    }

}