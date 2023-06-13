<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Joueur;
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
        $attaquants = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'BU','equipe' => 1 ] ,[]);
        $defenseurs = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'DEF','equipe' => 1 ] ,[]);
        $gardiens = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'G','equipe' => 1 ] ,[]);

        return $this->render('equipe/index.html.twig', [
            'equipe' => $equipe,
            'attaquants' => $attaquants,
            'defenseurs' => $defenseurs,
            'gardiens' => $gardiens,
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
        $attaquants = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'BU','equipe' => 2 ] ,[]);
        $defenseurs = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'DEF','equipe' => 2 ] ,[]);
        $gardiens = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'G','equipe' => 2 ] ,[]);
        return $this->render('equipe/index.html.twig', [
            'equipe' => $equipe,
            'attaquants' => $attaquants,
            'defenseurs' => $defenseurs,
            'gardiens' => $gardiens,
        ]);
    }

    #[Route('/generalView2', name: 'app_indexTeam2')]
    public function indexTeam2(): Response
    {
        
        return $this->render('generalView/teamView2.html.twig', [
            
        ]);
    }
}
