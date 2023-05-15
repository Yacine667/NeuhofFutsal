<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Entity\Post;
use App\Form\PostType;
use App\Form\ReponseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ManagerRegistry $doctrine, Actualite $actualites = null, Request $request): Response
    {

        $actualites = $doctrine->getRepository(Actualite::class)->findAll();
        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    #[Route('/actualite/{id}', name: 'details_actualite')]

    public function details(ManagerRegistry $doctrine,Actualite $actualite, Request $request): Response
    {   

        $post= new Post ();
        $postForm = $this->createForm(PostType::class);
        $postForm->handleRequest($request);

        if($postForm->isSubmitted() && $postForm->isValid()) {  
            $post = $postForm->getData();
            $entityManager = $doctrine->getManager();
            $post->setDateCreation(new \DateTime());
            $post->setUser($this->getUser());
            $post->setActualite($actualite);
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('details_actualite',['id'=> $actualite->getId()
            ]);
        }

        return $this->render('actualite/details.html.twig', [
            'actualite' => $actualite,
            'formAddPost' => $postForm->createView(),

        ]);
    
    }

 #[Route('/comment/{id}', name: 'delete_comment')]

    public function deleteComment(ManagerRegistry $doctrine,Post $post)
  {

    $actuId = $post->getActualite()->getId();
    $entityManager=$doctrine->getManager();
    $entityManager->remove($post) ; 
    $entityManager->flush();


   return $this->redirectToRoute('details_actualite',['id'=> $actuId
]);

}

}