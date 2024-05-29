<?php

namespace App\Controller\Admin;

use App\Entity\LinksFolder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LinksFolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LinksFolder::class;
    }
}
