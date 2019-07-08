<?php
namespace Checklist\Data;

class CommonList
{
    protected $itens;
    protected $topo = 0;

    public function add($item)
    {
        $this->itens[$this->topo] = $item;
        $this->topo++;
    }

    public function getList()
    {
        return $this->itens;
    }

    public function getQuantidadeItens()
    {
        return count($this->itens);
    }
}