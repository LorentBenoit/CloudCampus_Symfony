<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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
        $this->assertSelectorTextContains('h1', 'Register');
    }

    public function testValidRegister()
    {
        $this->client->request('GET', '/register');

        // Soumettre le formulaire
        $this->client->submitForm('Register', [
            'registration_form[firstname]' => 'John',
            'registration_form[lastname]' => 'Doe',
            'registration_form[email]' => 'test@example.com',
            'registration_form[plainPassword]' => 'password123',
            'registration_form[agreeTerms]' => true,
        ]);

        $this->assertResponseRedirects();
        $this->client->followRedirect();

        $this->assertSelectorTextContains('h1', "Vous n'êtes pas connecté.");

        $entityManager = self::$container->get('doctrine.orm.entity_manager');

        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => 'test@example.com']);

        // Assert that the user exists
        $this->assertEquals('John', $user->getFirstName);
        $this->assertEquals('Doe', $user->getLastName);
        $this->assertEquals('test@example.com', $user->getEmail);
        $this->assertTrue((password_verify('test@example.com', $user->getPassword)));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Remettre client à null
        $this->client = null;
    }
}

?>