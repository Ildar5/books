<?php

namespace App\Controller\Admin;

use App\Entity\Authors;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AuthorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Authors::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('first_name'),
            TextField::new('last_name'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'first_name', 'last_name', 'search'])
            ->setPaginatorPageSize(20);
    }
}
