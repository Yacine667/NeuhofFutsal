<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ButController extends AbstractController
{
    #[Route('/but', name: 'app_but')]
    public function index(): Response
    {
        return $this->render('but/index.html.twig', [
            'controller_name' => 'ButController',
        ]);
    }
}
