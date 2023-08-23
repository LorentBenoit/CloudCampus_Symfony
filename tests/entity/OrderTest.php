<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Order;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

class OrderTest extends KernelTestCase {

    public function testEntity () {
        
        $user = new User();
        $user->setEmail("benoitlorent50@gmail.com");

        $order = new Order();
        $order->setNumber(2);
        $order->setTotalPrice(100);
        $order->setUserId($user);

        $this->assertEquals(2, $order->getNumber());
        $this->assertEquals(100, $order->getTotalPrice());
        $this->assertEquals("benoitlorent50@gmail.com", $order->getUserId()->getEmail());
    }
}