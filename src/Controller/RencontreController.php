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
    public function index(ManagerRegistry $doctrine, Oppose $rencontres = null, Request $request): Response
    {
        $rencontres = $doctrine->getRepository(Oppose::class)->findBy(['equipe_1' => 1 ] ,[]);
        return $this->render('rencontre/index.html.twig', [
            'rencontres' => $rencontres,
        ]);
    }

    #[Route('/rencontre2', name: 'app_rencontre2')]
    public function index2(ManagerRegistry $doctrine, Oppose $rencontres = null, Request $request): Response
    {
        $rencontres = $doctrine->getRepository(Oppose::class)->findBy(['equipe_1' => 2 ] ,[]);
        return $this->render('rencontre/index.html.twig', [
            'rencontres' => $rencontres,
        ]);
    }
}
