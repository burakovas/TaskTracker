<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/front", name="login")
     */
    public function index()
    {
        return $this->render('front/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}
