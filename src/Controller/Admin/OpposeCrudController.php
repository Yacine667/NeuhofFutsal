<?php

namespace App\Controller\Admin;

use App\Entity\Oppose;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpposeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Oppose::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield AssociationField::new('equipe_1');
        yield AssociationField::new('equipe_2');
        yield AssociationField::new('rencontre');

    }
}
