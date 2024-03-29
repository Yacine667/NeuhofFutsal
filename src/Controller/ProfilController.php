<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\PostType;
use App\Form\ProfilType;
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
        if ($this->getUser() == null) {
            $this->addFlash('error', 'Vous ne pouvez pas accéder a cette page sans être connecté.');
            return $this->redirectToRoute('app_home');
        }

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
        $this->addFlash('success', 'Votre Profil a correctement été supprimé !');


        return $this->redirectToRoute('app_home');
    }

    #[Route('/comment/editProfil/{id}', name: 'edit_profil')]
    public function editProfil(ManagerRegistry $doctrine, User $user, Request $request, $id): Response {

        if ($this->getUser() == null) {
            $this->addFlash('error', 'Vous ne pouvez pas accéder a cette page sans être connecté.');
            return $this->redirectToRoute('app_home');
        }

        $currUserId = $this->getUser()->getId();
        $userId = $user ->getId();

        if($currUserId == $userId) {
            $form = $this->createForm(ProfilType::class, $user, ['edit' => true]);
            $form->handleRequest($request);
        
            if($form->isSubmitted() && $form->isValid()) {
                $em = $doctrine->getManager();
                $em->flush();
                $this->addFlash('success', 'Profil Modifié !');
                return $this->redirectToRoute('app_profil', ['id' => $currUserId]);
            }

            return $this->render('profil/edit_profil.html.twig', [
                'formEditProfil' => $form->createView(),
                'user' => $user
            ]);
        } 

        else {
            $this->addFlash('error', "Les Modifications N'ont Pas été Prises En Compte !");
            return $this->render('profil/edit_profil.html.twig');
        }
    }
}
