<?php

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Controller\LoginController;
use App\DateFixture\UserFixtures;
use Doctrine\ORM\Mapping as ORM;

class ConnexionTest extends KernelTestCase {

    public function testLoginWithValidCredentials(): void
    {
        $client = static::createClient();
        $client->request('POST', '/login', [
            '_username' => 'benoitlorent50@gmail.com',
            '_password' => 'azerty123',
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Vous êtes connecté !');
    }

    public function testLoginWithInvalidCredentials(): void
    {
        $client = static::createClient();
        $client->request('POST', '/login', [
            '_username' => 'benoitlorent50@gmail.com',
            '_password' => 'wrongpassword',
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('div.alert-danger', 'Invalid credentials.');
    }
}