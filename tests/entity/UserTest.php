<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\User;

class UserTest extends KernelTestCase {

    public function testEntity () {
        $user = new User();
        $user->setLastName("LORENT");
        $user->setFirstName("Benoît");
        $user->setEmail("benoitlorent50@gmail.com");
        $user->setPassword("azerty123");
        $user->setRoles(["Admin"]);
        $userIdentifier = $user->getUserIdentifier();

        $this->assertEquals("LORENT", $user->getLastName());
        $this->assertEquals("Benoît", $user->getFirstName());
        $this->assertEquals("benoitlorent50@gmail.com", $user->getEmail());
        $this->assertEquals("azerty123", $user->getPassword());
        $this->assertContains("Admin", $user->getRoles());
        $this->assertEquals("benoitlorent50@gmail.com", $userIdentifier);
    }
}