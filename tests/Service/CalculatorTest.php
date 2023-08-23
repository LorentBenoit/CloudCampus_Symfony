<?php

namespace App\Tests;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testGetTotalHT()
    {
        $calculator = new Calculator();

        $products = [
            ['quantity' => 2, 'price' => 10],
            ['quantity' => 3, 'price' => 15],
        ];

        $expectedTotalHT = 10 * 2 + 15 * 3;

        $this->assertEquals($expectedTotalHT, $calculator->getTotalHT($products));
    }

    public function testGetTotalTTC()
    {
        $calculator = new Calculator();

        $products = [
            ['quantity' => 2, 'price' => 10],
            ['quantity' => 3, 'price' => 15],
        ];

        $tva = 20;

        $expectedTotalTTC = (10 * 2 + 15 * 3) * (1 + $tva / 100);

        $this->assertEquals($expectedTotalTTC, $calculator->getTotalTTC($products, $tva));
    }

    private function createProduct($price)
    {
        $product = new \stdClass();
        $product->price = $price;

        return $product;
    }
}

?>