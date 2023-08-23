<?php

namespace App\Service;

class Calculator
{

    public function getTotalHT($products)
    {
        $totalHT = 0;

        foreach ($products as $product) {
            $totalHT += $product['product']->getPrice() * $product['quantity'];
        }
        
        return $totalHT;
    
    }

    public function getTotalTTC($products, $tva)
    {
        $totalHT = $this->getTotalHT($products);

        $totalTTC = $totalHT * (1 + $tva / 100);

        return $totalTTC;
    }
}

?>