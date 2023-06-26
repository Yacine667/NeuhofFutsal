<?php

namespace App\Controller;

use App\Entity\Oppose;
use App\Entity\Rencontre;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RencontreController extends AbstractController
{
    #[Route('/rencontre', name: 'app_rencontre')]
    public function index(ManagerRegistry $doctrine,  Request $request): Response
    {
        $rencontresDom = $doctrine->getRepository(Oppose::class)->findBy(['equipe_1' => 1 ] ,[]);
        $rencontresExt = $doctrine->getRepository(Oppose::class)->findBy(['equipe_2' => 1 ] ,[]);
        
        return $this->render('rencontre/index.html.twig', [
            'rencontresDom' => $rencontresDom,
            'rencontresExt' => $rencontresExt,
        ]);
    }

    #[Route('/rencontre2', name: 'app_rencontre2')]
    public function index2(ManagerRegistry $doctrine, Request $request): Response
    {
        $rencontresDom = $doctrine->getRepository(Oppose::class)->findBy(['equipe_1' => 2 ] ,[]);
        $rencontresExt = $doctrine->getRepository(Oppose::class)->findBy(['equipe_2' => 2 ] ,[]);
        
        return $this->render('rencontre/index.html.twig', [
            'rencontresDom' => $rencontresDom,
            'rencontresExt' => $rencontresExt,
        ]);
    }
}
