<?php

namespace App\Controller\Admin;

use App\Entity\Authors;
use App\Entity\BookAuthors;
use App\Entity\Books;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Books'),
            MenuItem::linkToCrud('Book', 'fa fa-book', Books::class),

            MenuItem::section('Authors'),
            MenuItem::linkToCrud('Author', 'fa fa-user', Authors::class),

            MenuItem::section('Book Authors'),
            MenuItem::linkToCrud('BookAuthors', 'fa fa-users', BookAuthors::class),
        ];
    }
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(BooksCrudController::class)->generateUrl());
    }
    /**
     * @Route("/admin/authors")
     */
    public function authors(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(AuthorsCrudController::class)->generateUrl());
    }
    /**
     * @Route("/admin/book-authors")
     */
    public function bookAuthors(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(BookAuthorsCrudController::class)->generateUrl());
    }
}
