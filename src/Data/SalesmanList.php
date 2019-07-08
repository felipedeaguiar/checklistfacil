<?php
namespace Checklist\Data;

use Checklist\Models\Sales;
use Checklist\Models\Salesman;

class SalesmanList extends CommonList
{
    public function getByName(string $nome): Salesman
    {
        foreach ($this->itens as $item){
            if($item->getName() == $nome){
               $vendedor = $item;
            }
        }

        if(!empty($vendedor)){
            return $vendedor;
        }

    }

    public function getMediaSalarial(): float
    {
        $salario = null;

        foreach ($this->itens as $item){
            $salario += $item->getSalary();
        }

        return $salario/count($this->itens);
    }

    public function getPiorVendedor(): Salesman
    {
        $piorVendedor = $this->itens[0];

        foreach ($this->itens as $vendedor){
            if($vendedor->getTotalVendido() < $piorVendedor->getTotalVendido()){
                $piorVendedor = $vendedor;
            }
        }

        return $piorVendedor;
    }

}