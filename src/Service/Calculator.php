<?php

namespace App\Service;

class Calculator
{

    public function getTotalHT($products)
    {
        $totalHT = 0;

        foreach ($products as $product) {
            $totalHT += $product['product']->$price * $product['quantity'];
        }

        return $totalHT;
    }

    public function getTotalTTC($totalHT, $tva)
    {
        $totalTTC = $totalHT * (1 + $tva / 100);

        return $totalTTC;
    }
}

?>