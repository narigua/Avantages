<?php

namespace Avantages\Bundle\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('name')
            ->add('rcs')
            ->add('capital')
            ->add('civility')
            ->add('firstname')
            ->add('lastname')
            ->add('address')
            ->add('postCode')
            ->add('city')
            ->add('country')
            ->add('phone')
            ->add('phone2')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Avantages\Bundle\PartnerBundle\Entity\Partner'
        ));
    }

    public function getName()
    {
        return 'avantages_bundle_partnerbundle_partnertype';
    }
}
