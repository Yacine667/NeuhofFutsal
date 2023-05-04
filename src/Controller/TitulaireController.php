<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TitulaireController extends AbstractController
{
    #[Route('/titulaire', name: 'app_titulaire')]
    public function index(): Response
    {
        return $this->render('titulaire/index.html.twig', [
            'controller_name' => 'TitulaireController',
        ]);
    }
}
