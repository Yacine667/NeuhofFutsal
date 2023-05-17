<?php

namespace App\Controller;

use App\Entity\Entraineur;
use Doctrine\ORM\Mapping\Id;
use App\Repository\EntraineurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntraineurController extends AbstractController
{
    #[Route('/entraineur', name: 'app_entraineur')]
    public function index(EntraineurRepository $tr,ManagerRegistry $doctrine, Entraineur $entraineurs = null, Request $request): Response
    {

        $entraineurs = $tr->findTrainerByEquipe();
        return $this->render('entraineur/index.html.twig', [
            'entraineurs' => $entraineurs,]);
}

#[Route('/entraineur2', name: 'app_entraineur2')]
public function index2(EntraineurRepository $tr,ManagerRegistry $doctrine, Entraineur $entraineurs = null, Request $request): Response
{

    $entraineurs = $tr->findTrainerByEquipe2();
    return $this->render('entraineur/index.html.twig', [
        'entraineurs' => $entraineurs,]);
}
}
