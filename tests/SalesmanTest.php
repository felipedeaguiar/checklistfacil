<?php

use Checklist\Models\Salesman;
use Checklist\Data\SalesmanList;
use PHPUnit\Framework\TestCase;

class SalesmanTest extends TestCase
{
    public function testGetByName(){

        $salesMan = new Salesman(1, '08445764926', 'Felipe', 200.2);
        $salesmanList = new SalesmanList();
        $salesmanList->add($salesMan);

        $this->assertEquals(1,count($salesmanList->getList()));
        $this->assertEquals('Felipe', $salesmanList->getByName('Felipe')->getName());
    }

    public function testMenorSalario(){

        $salesMan1 = new Salesman(1, '08445764926', 'Felipe', 200.2);
        $salesMan2 = new Salesman(2, '0349823392', 'Roberto', 2010.2);
        $salesMan3 = new Salesman(3, '1212121212', 'Aguiar', 20120.2);

        $salesmanList = new SalesmanList();
        $salesmanList->add($salesMan1);
        $salesmanList->add($salesMan2);
        $salesmanList->add($salesMan3);

        $this->assertEquals(3,count($salesmanList->getList()));
        $this->assertEquals(1, $salesmanList->getPiorVendedor()->getId());

    }

    public function testGetMediaSalarial(){

        $salesMan1 = new Salesman(1, '08445764926', 'Felipe', 200);
        $salesMan2 = new Salesman(2, '0349823392', 'Roberto', 200);
        $salesMan3 = new Salesman(3, '1212121212', 'Aguiar', 200);

        $salesmanList = new SalesmanList();
        $salesmanList->add($salesMan1);
        $salesmanList->add($salesMan2);
        $salesmanList->add($salesMan3);

        $this->assertEquals(200, $salesmanList->getMediaSalarial());

    }
}
