<?php

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\LoginController;
use App\DateFixture\UserFixtures;
use Doctrine\ORM\Mapping as ORM;

class LoginTest extends WebTestCase {

    public function testLoginWithValidCredentials(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('login')->form();
        $form['_username'] = 'benoitlorent50@gmail.com';
        $form['_password'] = 'azerty123';

        $client->submit($form);

        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Vous êtes connecté.');
    }

    public function testLoginWithInvalidCredentials(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('login')->form();
        $form['_username'] = 'benoitlorent50@gmail.com';
        $form['_password'] = 'azerty12345';

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('div.alert-danger', 'Invalid credentials.');
    }
}

?>