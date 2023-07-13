<?php

namespace App\Controller;

use App\Entity\Equipe;
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
    public function index(ManagerRegistry $doctrine, Equipe $equipe = null, Request $request): Response
    {

        $equipe = $doctrine->getRepository(Equipe::class)->findOneBy(['id' => 1 ] ,[]);

        return $this->render('entraineur/index.html.twig', [
            'equipe' => $equipe 
        ]);
}

    #[Route('/entraineur2', name: 'app_entraineur2')]
    public function index2(ManagerRegistry $doctrine, Equipe $equipe = null, Request $request): Response
    {

        $equipe = $doctrine->getRepository(Equipe::class)->findOneBy(['id' => 2 ] ,[]);

        return $this->render('entraineur/index.html.twig', [
            'equipe' => $equipe 
        ]);
    }

    #[Route('/entraineur/{id}/delete', name: 'entraineur_delete')]
    public function delete(ManagerRegistry $doctrine, Entraineur $entraineur){   

        if ($this->isGranted('ROLE_ADMIN')) {

            $equipes = $entraineur->getEquipes();
            $entityManager = $doctrine->getManager();
            // Détacher les posts de l'utilisateur
            foreach ($equipes as $equipe) {

                $equipe->setEntraineur(null);
                $entityManager->persist($equipe);

            }

            $entityManager->remove($entraineur);
            $entityManager->flush();


        return $this->redirectToRoute('admin');
        }

        else {

            $this->addFlash('error', "Vous N'avez Pas Les Droits Requis");
            return $this->redirectToRoute("app_home");
            
        }

    }
}