<?php
namespace Checklist\Data;

use Checklist\Models\Sales;

class SalesList extends CommonList
{
    public function getMaiorVenda(): Sales
    {
        $maiorValor = 0;

        foreach ($this->itens as $venda){
            $total = $venda->getValorTotalVenda();

            if($total > $maiorValor){
                $maiorValor= $total;
                $maiorVenda = $venda;
            }
        }

        return $maiorVenda;
    }
}