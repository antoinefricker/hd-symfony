<?php

namespace App\Controller\Admin;

use App\Entity\{LinksFolder,Link};
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{TextField,AssociationField};

class LinksFolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LinksFolder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('display_name'),
            AssociationField::new('links')
        ];
    }
}
