<?php

namespace App\Controller\Admin;

use App\Entity\BookAuthors;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class BookAuthorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BookAuthors::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('author')->autocomplete(),
            AssociationField::new('book')->autocomplete(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['book_id', 'author_id'])
            ->setPaginatorPageSize(20);
    }
}
