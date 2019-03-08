<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{
    /**
     * @Route("/pruebas", name="pruebas")
     */
    public function index()
    {
        return $this->render('navbar.html.twig', [
            'controller_name' => 'PruebasController',
        ]);
    }
}
