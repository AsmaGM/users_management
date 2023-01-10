<?php

namespace App\Controller\Admin;

use App\Entity\Group;
use App\Entity\User;
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
          $url = $routeBuilder->setController(GroupCrudController::class)->generateUrl();
          return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Users Management');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Groups', 'fa fa-group', Group::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);

    }
}
