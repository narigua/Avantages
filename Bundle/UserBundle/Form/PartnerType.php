<?php

namespace Avantages\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nom de la société'))
            ->add('username')
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation'),
                'invalid_message' => 'Les mots de passe ne correspondent pas'
            ))
            ->add('civility', 'choice', array(
                'choices' => array('M' => 'Homme', 'F' => 'Femme')
            ))
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('address')
            ->add('postcode')
            ->add('city')
            ->add('country', 'country')
            ->add('phone')
            ->add('phone2')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Avantages\Bundle\UserBundle\Entity\Partner'
        ));
    }

    public function getName()
    {
        return 'avantages_bundle_userbundle_partnertype';
    }
}
