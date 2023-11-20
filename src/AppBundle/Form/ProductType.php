<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                'class'     => Category::class,
                // 'choice_label'  => 'id',
                'label'     => "Kategoria"
            ])
            ->add('name', TextType::class, [
                'label'         => "Nazwa",
                'attr'  => [
                    'placeholder'   => "Wprowadź nazwę..."
                ]
                /*
                'constraints'   => [
                    new Assert\NotBlank()
                ]
                 */
            ])
            ->add('description')
            ->add('price', MoneyType::class, [
                
            ])
            ->add('save', SubmitType::class, [
                'label' => "Zapisz"
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }
}
