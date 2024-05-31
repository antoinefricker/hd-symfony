<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ {
    IdField, ArrayField, EmailField, TextField}
    ;
    use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
    use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
    use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

    class AdminCrudController extends AbstractCrudController {
        public static function getEntityFqcn(): string {
            return Admin::class;
        }

        public function configureFields( string $pageName ): iterable {
            return [
                IdField::new( 'id' ),
                EmailField::new( 'email' ),
                TextField::new( 'password' ),
                ArrayField::new( 'roles' )
            ];
        }

        public function configureActions( Actions $actions ): Actions {
            return $actions
            ->remove( Crud::PAGE_INDEX, Action::NEW )
            ->remove( Crud::PAGE_INDEX, Action::EDIT );
        }
    }
