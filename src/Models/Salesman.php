<?php
namespace Checklist\Models;

class Salesman
{
    protected $id;
    protected $cpf;
    protected $name;
    protected $salary;
    protected $totalVendido;

    public function __construct(int $id, String $cpf, String $name, Float $salary)
    {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getCpf(): String
    {
        return $this->cpf;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @return Float
     */
    public function getSalary(): Float
    {
        return $this->salary;
    }

    /**
     * @param String $cpf
     */
    public function setCpf(String $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param String $name
     */
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @param Float $salary
     */
    public function setSalary(Float $salary)
    {
        $this->salary = $salary;
    }

    /**
     * @param mixed $totalVendido
     */
    public function setTotalVendido($totalVendido)
    {
        $this->totalVendido += $totalVendido;
    }

    /**
     * @return mixed
     */
    public function getTotalVendido()
    {
        return $this->totalVendido;
    }
}