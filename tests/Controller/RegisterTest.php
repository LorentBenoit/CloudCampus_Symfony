<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RegisterTest extends WebTestCase
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
        $this->client->request('GET', '/register');

        // Vérifier qu'elle est en succès
        $this->assertResponseIsSuccessful();

        // Vérifier que la page contient bien le titre
        $this->assertSelectorTextContains('h1', 'Connexion');
    }

    public function testValidRegister()
    {
        $this->client->request('GET', '/register');

        // Soumettre le formulaire
        $this->client->submitForm('login', [
            '_username' => 'benoitlorent50@gmail.com',
            '_password' => "azerty123"
        ]);

        $this->assertResponseRedirects();
        $this->client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Vous êtes connecté.');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Remettre client à null
        $this->client = null;
    }
}

?>