<?php

namespace App\Tests;

use App\Service\Calculator;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{

    public function getProducts()
    {
        return [
            [
                'product' => $this->createProduct("Ballon rouge", 10),
                'quantity' => 2
            ],
            [
                'product' => $this->createProduct("Ballon bleu", 15),
                'quantity' => 3
            ]
        ];
    }

    public function createProduct($name, $price)
    {
        return ((new Product())
        ->setName($name)
        ->setPrice($price));
    }

    public function testGetTotalHT()
    {
        $calculator = new Calculator();

        $products = $this->getProducts();

        $this->assertEquals(65, $calculator->getTotalHT($products));
    }

    public function testGetTotalTTC()
    {
        $calculator = new Calculator();

        $totalHT = $this->getProducts();

        $tva = 20;

        $this->assertEquals(78, $calculator->getTotalTTC($totalHT, $tva));
    }
}

?>