<?php

namespace App\Service;

class Calculator
{
    public function getTotalHT($products)
    {
        $totalHT = 0;

        foreach ($products as $product) {
            $totalHT += $product['price'] * $product['quantity'];
        }

        return $totalHT;
    }

    public function getTotalTTC($products, $tva)
    {
        $totalTTC = 0;

        foreach ($products as $product) {
            $totalTTC += $product['price'] * $product['quantity'] * (1 + $tva / 100);
        }

        return $totalTTC;
    }
}

?>