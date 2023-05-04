<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemplacantController extends AbstractController
{
    #[Route('/remplacant', name: 'app_remplacant')]
    public function index(): Response
    {
        return $this->render('remplacant/index.html.twig', [
            'controller_name' => 'RemplacantController',
        ]);
    }
}
