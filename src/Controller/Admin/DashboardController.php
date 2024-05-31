<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use App\Entity\Admin;
use App\Entity\LinksFolder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController {
    #[ Route( '/admin', name: 'admin' ) ]

    public function index(): Response {
        $routeBuilder = $this->container->get( AdminUrlGenerator::class );
        $url = $routeBuilder->setController( LinksFolderCrudController::class )->generateUrl();

        return $this->redirect( $url );
    }

    public function configureDashboard(): Dashboard {
        return Dashboard::new()
        ->setTitle( 'Dashboard' );
    }

    public function configureMenuItems(): iterable {
        yield MenuItem::linkToRoute( 'Application', 'fa fa-home', 'app_index' );
        yield MenuItem::linkToCrud( 'Link', 'fas fa-list', Link::class );
        yield MenuItem::linkToCrud( 'LinksFolder', 'fas fa-list', LinksFolder::class );
        yield MenuItem::linkToCrud( 'Users', 'fas fa-list', Admin::class );
    }
}
