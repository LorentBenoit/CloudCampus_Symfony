<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Security $security): Response
    {
        $user = $security->getUser();

            return $this->render('home/home.html.twig');
    }
}