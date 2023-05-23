<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Stade;
use App\Entity\Ville;
use App\Entity\Equipe;
use App\Entity\Joueur;
use App\Entity\Oppose;
use App\Entity\Actualite;
use App\Entity\Rencontre;
use App\Entity\Entraineur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


    
class DashboardController extends AbstractDashboardController
{

/**
 * @Route("/admin", name="admin")
 *
 * @IsGranted("ROLE_ADMIN")
 */
    public function index(): Response
    {
        
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ActualiteCrudController::class)->generateUrl();

        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('C.S.C Neuhof Futsal');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Retourner Au Site', 'fa-solid fa-left-long', 'app_home');
        yield MenuItem::linkToCrud('Actualités', 'fa-regular fa-newspaper', Actualite::class);
        yield MenuItem::linkToCrud('Entraineurs', 'fa-solid fa-person-dots-from-line', Entraineur::class);
        yield MenuItem::linkToCrud('Equipes', 'fa-solid fa-people-group', Equipe::class);
        yield MenuItem::linkToCrud('Joueurs', 'fa-solid fa-street-view', Joueur::class);
        yield MenuItem::linkToCrud('Rencontres', 'fa-solid fa-futbol', Rencontre::class);
        yield MenuItem::linkToCrud('Matchs', 'fa-solid fa-futbol', Oppose::class);
        yield MenuItem::linkToCrud('Stades', 'fa-solid fa-school', Stade::class);
        yield MenuItem::linkToCrud('Villes', 'fa-solid fa-tree-city', Ville::class);
        yield MenuItem::linkToCrud('User', 'fa-solid fa-user', User::class);
        yield MenuItem::linkToCrud('Comments', 'fa-regular fa-comment', Post::class);
    }
}
