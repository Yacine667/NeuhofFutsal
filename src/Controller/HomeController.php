<?php

namespace App\Controller;

use App\Entity\Actualite;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, Actualite $actualites = null, Request $request): Response
    {

        $actualites = $doctrine->getRepository(Actualite::class)->findBy(array(),array('id' => 'DESC'),3 ,0);
        return $this->render('home/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }
}
