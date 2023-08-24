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

        if ($user) {
            return $this->render('home/logged_in.html.twig');
        } else {
            return $this->render('home/not_logged_in.html.twig');
        }
    }
}