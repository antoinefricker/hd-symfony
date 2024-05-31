<?php

namespace App\Controller\Admin;

use App\Entity\LinksFolder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ {
    TextField, AssociationField, ColorField}
    ;

    class LinksFolderCrudController extends AbstractCrudController {
        public static function getEntityFqcn(): string {
            return LinksFolder::class;
        }

        public function configureFields( string $pageName ): iterable {
            return [
                TextField::new( 'display_name' ),
                ColorField::new( 'color' ),
                TextField::new( 'icon' )->setMaxLength( 64 )->setLabel( '<a target="_blank" href="https://ux.symfony.com/icons?query=book&set=tabler">Icon</a>' ),
                AssociationField::new( 'owners' ),
                AssociationField::new( 'links' ),
            ];
        }
    }
