<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;


class ProductEditType extends ProductType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->remove('price')
        ;
    }

}
