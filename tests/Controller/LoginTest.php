<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        parent::setUp();

        //Créer le client
        $this->client = static::createClient();
    }

    public function testLoginPageIsRender()
    {
        // Faire la requête
        $this->client->request('GET', '/login');

        // Vérifier qu'elle est en succès
        $this->assertResponseIsSuccessful();

        // Vérifier que la page contient bien le titre
        $this->assertSelectorTextContains('h1', 'Connexion');
    }

    public function testValidLogin()
    {
        $this->client->request('GET', '/login');

        // Soumettre le formulaire
        $this->client->submitForm('login', [
            '_username' => 'benoitlorent50@gmail.com',
            '_password' => "azerty123"
        ]);

        $this->assertResponseRedirects();
        $this->client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Vous êtes connecté.');
    }

    public function testInvalidLogin()
    {
        $crawler = $this->client->request('GET', '/login');

        // Soumettre le formulaire
        $this->client->submitForm('login', [
            '_username' => 'benoitlorent50@gmail.com',
            '_password' => "azerty12345"
        ]);

        $this->assertResponseRedirects();
        $this->client->followRedirect();

        $this->assertSelectorTextContains('div', 'Invalid credentials.');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Remettre client à null
        $this->client = null;
    }
}

?>