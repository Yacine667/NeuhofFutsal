<?php

namespace App\Controller;

use App\Entity\Stade;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StadeController extends AbstractController
{
    #[Route('/stade', name: 'app_stade')]
    public function index(): Response
    {
        return $this->render('stade/index.html.twig', [
            'controller_name' => 'StadeController',
        ]);
    }

    #[Route('/stade/{id}', name: 'details_stade')]
    public function details(Stade $stade): Response
    {   

        return $this->render('stade/details.html.twig', [
            'stade' => $stade,

        ]);
    }
}
