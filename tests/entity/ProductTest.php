<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase {

    public function testEntity () {
        $product = new Product();
        $product->setName("Ballon rouge");
        $product->setPrice(100);

        $this->assertEquals("Ballon rouge", $product->getName());
        $this->assertEquals(100, $product->getPrice());
    }
}