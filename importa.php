<?php

include_once 'vendor/autoload.php';

use Checklist\Models\Sales;
use Checklist\Models\Customer;
use Checklist\Models\Item;
use Checklist\Models\Salesman;
use Checklist\Data\SalesmanList;
use Checklist\Data\CustomerList;
use Checklist\Data\ItemList;
use Checklist\Data\SalesList;
use Checklist\Commons\ImportaArquivo;
use Checklist\Commons\ParseDat;
use Checklist\Commons\GeraArquivo;

header("Access-Control-Allow-Origin: *");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = $_FILES;
    $ext = pathinfo($file['file']['name'], PATHINFO_EXTENSION);

    if($ext != "dat" || empty($file)){
        echo json_encode(array('status'=>false, 'msg' => 'Arquivo com extensão inválida ou nada enviado'));
    }else{

        $importaArquivo = new ImportaArquivo('data/in/');
        $importaArquivo->setFile($file);
        $parseDat = new ParseDat($importaArquivo->importar());
        $parseDat->parse();

        $geraArquivo = new GeraArquivo($parseDat);
        $geraArquivo->setPath('data/out');
        $arquivo = $geraArquivo->gerar();

        $retorno = array(
            'status' => true,
            'qtdVendedores' => count($parseDat->getSalesManList()->getList()),
            'qtdClientes' => count($parseDat->getCustomerList()->getList()),
            'mediaSalarial' => $parseDat->getSalesManList()->getMediaSalarial(),
            'idVendaMaisCara' => $parseDat->getSalesList()->getMaiorVenda()->getSalesId(),
            'nomePiorVendedor' => $parseDat->getSalesManList()->getPiorVendedor()->getName(),
            'arquivoRelatorio' => $arquivo
        );

        echo json_encode($retorno);
    }

}

