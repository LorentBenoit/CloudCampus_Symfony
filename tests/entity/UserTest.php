<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase {

    public function testEntity () {
        $user = new User();
        $user->setLastName("LORENT");
        $user->setFirstName("Benoît");
        $user->setEmail("benoitlorent50@gmail.com");
        $user->setPassword("azerty123");
        $user->setRole("Admin");

        $this->assertEquals("LORENT", $user->getLastName());
        $this->assertEquals("Benoît", $user->getFirstName());
        $this->assertEquals("benoitlorent50@gmail.com", $user->getEmail());
        $this->assertEquals("azerty123", $user->getPassword());
        $this->assertEquals("Admin", $user->getRole());
    }
}