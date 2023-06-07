<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_profil')]
    public function index(ManagerRegistry $doctrine, User $user, Request $request, $id): Response
    {  
        $currUserId = $this->getUser()->getId();
        if($currUserId != $id){
        return $this->redirectToRoute('app_profil', ['id' => $currUserId]);

    }
        $user = $this->getUser(); 
        $posts=$user->getPost();
        $forms = [] ;
        foreach ($posts as $post){

        $form = $this->createForm(PostType::class, $post, ['edit' => true]);
        $forms[$post->getId()] = $form->createView();
        
        
        if($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_profil', ['id' => $currUserId]);
        }

    }
        
      
        
        return $this->render('profil/index.html.twig', [
            'user' => $user,
            'forms' =>$form->createView(),
        ]);
    }

    #[Route('/profil/{id}/delete', name: 'profil_delete')]
    public function delete(ManagerRegistry $doctrine){   
        $user = $this->getUser(); 
        $entityManager = $doctrine->getManager();

        // Détacher les posts de l'utilisateur
        foreach ($user->getPost() as $post) {
            $post->setUser(null);
            $entityManager->persist($post);
        }

        $entityManager->remove($user);
        $entityManager->flush();
        $this->container->get('security.token_storage')->setToken(null);


        return $this->redirectToRoute('app_home');
    }

    #[Route('/comment/editProfil/{id}', name: 'edit_comment_profil')]
public function editCommentProfil(ManagerRegistry $doctrine, Post $post, Request $request): Response
{

    
    $currUserId = $this->getUser()->getId();
    // éditer le topic uniquement si on en est l'auteur
    if($post->getUser() == $this->getUser()) {
        $form = $this->createForm(PostType::class, $post, ['edit' => true]);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_profil', ['id' => $currUserId]);
        }

        return $this->render('profil/index.html.twig', [
            'formEditComment' => $form->createView(),
        ]);
    } else {
        return $this->redirectToRoute("app_home");
    }
}
}
