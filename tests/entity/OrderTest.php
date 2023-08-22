<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Order;

class OrderTest extends KernelTestCase {

    public function testEntity () {
        $order = new Order();
        $order->setNumber(2);
        $order->setTotalPrice(100);
        $order->setUserId(1);

        $this->assertEquals(2, $order->getNumber());
        $this->assertEquals(100, $order->getTotalPrice());
        $this->assertEquals(1, $order->getUserId());
    }
}