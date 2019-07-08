<?php
namespace Checklist\Commons;

use Checklist\Data\SalesmanList;
use Checklist\Data\CustomerList;
use Checklist\Data\ItemList;
use Checklist\Data\SalesList;
use Checklist\Models\Sales;
use Checklist\Models\Customer;
use Checklist\Models\Item;
use Checklist\Models\Salesman;

class ParseDat
{
    protected $data;
    protected $salesManList;
    protected $customerList;
    protected $salesList;
    protected $file;


    public function __construct($file)
    {
        $this->file = $file;
        $this->data = file($file);
        $this->salesManList = new SalesManList();
        $this->customerList = new CustomerList();
        $this->salesList = new SalesList();
        $this->itemList = new ItemList();
    }

    public function getData()
    {
        return $this->data;
    }

    public function parse()
    {
        $rows = $this->getData();

        foreach ($rows as $row) {

            $row = trim($row);
            $data = explode(',', $row);

            if($data[0] == "001"){

                $this->salesManList->add(new Salesman($data[0], $data[1], $data[2], $data[3]));

            }elseif ($data[0] == "002"){

                $this->customerList->add(new Customer($data[0], $data[1], $data[2], $data[3]));

            }elseif($data[0] == "003"){

                $array = preg_match_all("/\\[(.*?)\\]/", $row, $out);
                $array = (explode( ',', $out[1][0]));

                $itemList = new ItemList();

                for($i=0; $i<count($array); $i++){
                    $item = explode('-', trim($array[$i]));
                    $preco = floatval(preg_replace("/[^0-9.]/", "",$item[2]));
                    $this->itemList->add(new Item(intval($item[0]), intval($item[1]), $preco));
                }

                $this->salesList->add(new Sales($data[0], $data[1], $this->itemList, $this->salesManList->getByName($data[5])));
            }
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getSalesList()
    {
        return $this->salesList;
    }

    public function getSalesManList()
    {
        return $this->salesManList;
    }

    public function getCustomerList()
    {
        return $this->customerList;
    }
}