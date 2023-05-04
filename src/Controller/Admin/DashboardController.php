<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Entraineur;
use App\Entity\Equipe;
use App\Entity\Joueur;
use App\Entity\Oppose;
use App\Entity\Rencontre;
use App\Entity\Stade;
use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ActualiteCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('NeuhofFutsal');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Actualite', 'fas fa-map-marker-alt', Actualite::class);
        yield MenuItem::linkToCrud('Entraineur', 'fas fa-map-marker-alt', Entraineur::class);
        yield MenuItem::linkToCrud('Equipe', 'fas fa-map-marker-alt', Equipe::class);
        yield MenuItem::linkToCrud('Joueurs', 'fas fa-map-marker-alt', Joueur::class);
        yield MenuItem::linkToCrud('Rencontre', 'fas fa-map-marker-alt', Rencontre::class);
        yield MenuItem::linkToCrud('Oppose', 'fas fa-map-marker-alt', Oppose::class);
        yield MenuItem::linkToCrud('Stade', 'fas fa-map-marker-alt', Stade::class);
        yield MenuItem::linkToCrud('Ville', 'fas fa-map-marker-alt', Ville::class);
    }
}
