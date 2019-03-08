<?php

namespace App\Form;

use App\Entity\Viajes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ViajesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salida')
            ->add('desde')
            ->add('hasta')
            ->add('llegada')
            ->add('timestamp')
            ->add('cuentaCorriente')
            ->add('chofer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Viajes::class,
        ]);
    }
}
