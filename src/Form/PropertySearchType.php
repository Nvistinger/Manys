<?php

namespace App\Form;

use App\Entity\PropertySearch;
use App\Entity\Selection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Budget maximal'
                ]
            ])
            ->add('selections', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Selection::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('address', null, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Adresse'
                ]
            ])
            ->add('distance', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    '5 km' => 5,
                    '10 km' => 10,
                    '20 km' => 20,
                ]
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}
