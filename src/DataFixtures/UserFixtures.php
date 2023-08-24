<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ){}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setLastName("LORENT");
        $user->setFirstName("Benoît");
        $user->setEmail("benoitlorent50@gmail.com");
        $user->setPassword($this->hasher->hashPassword($user, 'azerty123'));

        $manager->persist($user);
        $manager->flush();
    }
}

?>