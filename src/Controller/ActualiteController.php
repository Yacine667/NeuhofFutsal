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

        $actualites = $doctrine->getRepository(Actualite::class)->findBy(array(),array('id' => 'DESC'),null ,0);
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
            $this->addFlash('success', 'Commentaire Ajouté !');
            return $this->redirectToRoute('details_actualite',['id'=> $actualite->getId()
            ]);
        }

        return $this->render('actualite/details.html.twig', [
            'actualite' => $actualite,
            'formAddPost' => $postForm->createView(),

        ]);
    
    }

    #[Route('/comment/delete/{id}', name: 'delete_comment')]

    public function deleteComment(ManagerRegistry $doctrine,Post $post)
    {

    if ($post->getUser() == $this->getUser()) {

        $actuId = $post->getActualite()->getId();
        $entityManager=$doctrine->getManager();
        $entityManager->remove($post) ; 
        $entityManager->flush();
        $this->addFlash('success', 'Commentaire Supprimé !');
        return $this->redirectToRoute('details_actualite',['id'=> $actuId
        ]);

    }

    elseif ($this->isGranted('ROLE_ADMIN')) {

        $actuId = $post->getActualite()->getId();
        $entityManager=$doctrine->getManager();
        $entityManager->remove($post) ; 
        $entityManager->flush();
        $this->addFlash('success', 'Commentaire Supprimé !');
        return $this->redirectToRoute('details_actualite',['id'=> $actuId
        ]);
    
    }

    else {

        $this->addFlash('error', "Vous N'avez Pas Les Droits Requis");
        return $this->redirectToRoute("app_home");
    }

}

    #[Route('/comment/edit/{id}', name: 'edit_comment')]
    public function editComment(ManagerRegistry $doctrine, Post $post, Request $request): Response
    {

        $actuId = $post->getActualite()->getId();
        // éditer le topic uniquement si on en est l'auteur
        if($post->getUser() == $this->getUser()) {

            $form = $this->createForm(PostType::class, $post, ['edit' => true]);
            $form->handleRequest($request);
            
            if($form->isSubmitted() && $form->isValid()) {

                $em = $doctrine->getManager();
                $em->flush();
                $this->addFlash('success', 'Commentaire Modifié !');
                return $this->redirectToRoute('details_actualite', ['id' => $actuId]);
            }

            return $this->render('actualite/edit_comment.html.twig', [
                'formEditComment' => $form->createView(),
                'post' => $post
            ]);

        } 
        
        else {

            $this->addFlash('error', "Vous N'avez Pas Les Droits Requis");
            return $this->redirectToRoute("app_home");
        }
    }

}