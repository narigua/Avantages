<?php

namespace Avantages\Bundle\PartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DownloadableProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('wholeSalePrice')
            ->add('price')
            ->add('description')
            ->add('ean')
            ->add('reference')
            ->add('isEnabled')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('token')
            ->add('categories')
            ->add('owner')
            ->add('brand')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Avantages\Bundle\PartnerBundle\Entity\DownloadableProduct'
        ));
    }

    public function getName()
    {
        return 'avantages_bundle_partnerbundle_downloadableproducttype';
    }
}
