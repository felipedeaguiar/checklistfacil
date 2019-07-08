<?php


namespace Checklist\Commons;


use phpDocumentor\Reflection\Types\String_;

class GeraArquivo
{
    protected $parseDat;
    protected $path;

    public function __construct(ParseDat $parseDat)
    {
        $this->parseDat = $parseDat;
    }

    /**
     * @return ParseDat
     */
    public function getParseDat(): ParseDat
    {
        return $this->parseDat;
    }

    public function setPath(String $path)
    {
        $this->path = $path;
    }
    public function gerar()
    {
        $file = explode('/',$this->getParseDat()->getFile());
        $arquivo = explode('.', end($file));
        $arquivo = $arquivo[0]. '.done.' . $arquivo[1];
        $arquivo =  $this->path . '/'. $arquivo;
        $handle = fopen($arquivo, 'w');

        $data = "Relatorio:\n\n";
        $data .= "Quantidade de vendedores: ".count($this->getParseDat()->getSalesManList()->getList())."\n\n";
        $data .= "Quantidade de clientes: ".count($this->getParseDat()->getCustomerList()->getList())."\n\n";
        $data .= "Média Salarial dos vendedores: ". $this->getParseDat()->getSalesManList()->getMediaSalarial()."\n\n";
        $data .= "Id venda mais cara: ". $this->getParseDat()->getSalesList()->getMaiorVenda()->getSalesId()."\n\n";
        $data .= "Pior vendedor : ". $this->getParseDat()->getSalesManList()->getPiorVendedor()->getName()."\n\n";

        $data = fwrite($handle,$data);

        return $arquivo;

    }
}