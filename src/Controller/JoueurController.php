<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Repository\JoueurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JoueurController extends AbstractController
{
    #[Route('/joueur', name: 'app_joueur')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $attaquants = $doctrine->getRepository(Joueur::class)->findBy(['poste_joueur' => 'BU','equipe' => 1 ] ,[]);
        return $this->render('joueur/index.html.twig', [
            'attaquants' => $attaquants,
        ]);
    }

    #[Route('/joueur/{id}', name: 'details_joueur')]

    public function details(Joueur $joueur): Response
    {   

        return $this->render('joueur/details.html.twig', [
            'joueur' => $joueur,

        ]);
    }
}
