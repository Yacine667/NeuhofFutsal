<?php

namespace App\Controller;

use App\Entity\Equipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_equipe')]
    public function index(ManagerRegistry $doctrine, Equipe $equipe = null, Request $request): Response
    {
        $equipe = $doctrine->getRepository(Equipe::class)->findOneBy(['id' => 1 ] ,[]);
        return $this->render('equipe/index.html.twig', [
            'equipe' => $equipe,
        ]);
    }

    #[Route('/generalView', name: 'app_indexTeam')]
    public function indexTeam(): Response
    {
        
        return $this->render('generalView/teamView.html.twig', [
            
        ]);
    }

    #[Route('/equipe2', name: 'app_equipe2')]
    public function index2(ManagerRegistry $doctrine, Equipe $equipe = null, Request $request): Response
    {
        $equipe = $doctrine->getRepository(Equipe::class)->findOneBy(['id' => 2 ] ,[]);
        return $this->render('equipe/index.html.twig', [
            'equipe' => $equipe,
        ]);
    }

    #[Route('/generalView2', name: 'app_indexTeam2')]
    public function indexTeam2(): Response
    {
        
        return $this->render('generalView/teamView2.html.twig', [
            
        ]);
    }
}
