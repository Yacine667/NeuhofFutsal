<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvertirController extends AbstractController
{
    #[Route('/avertir', name: 'app_avertir')]
    public function index(): Response
    {
        return $this->render('avertir/index.html.twig', [
            'controller_name' => 'AvertirController',
        ]);
    }
}
