<?php
namespace Checklist\Models;

use Checklist\Data\ItemList;

class Sales
{
    protected $id;
    protected $saleId;
    protected $itemList;
    protected $salesMan;
    protected $valorTotal;

    /**
     * Sales constructor.
     * @param int $id
     * @param int $saleId
     * @param Item $item
     * @param Salesman $salesMan
     */
    public function __construct(int $id, int $saleId, ItemList $itemList, Salesman $salesMan)
    {
        $this->id = $id;
        $this->saleId = $saleId;
        $this->itemList = $itemList;
        $this->salesMan = $salesMan;
        $this->calculaValorTotalVenda();
    }

    public function getItens(): array
    {
        return $this->itemList;
    }

    public function getSalesId(): int
    {
        return $this->saleId;
    }

    private function calculaValorTotalVenda(): float
    {
        foreach ($this->itemList->getList() as $venda){
            $this->valorTotal += $venda->getPrice();
        }

        $this->salesMan->setTotalVendido($this->valorTotal);

        return $this->valorTotal;
    }

    public function getValorTotalVenda(): float
    {
        return $this->valorTotal;
    }

}