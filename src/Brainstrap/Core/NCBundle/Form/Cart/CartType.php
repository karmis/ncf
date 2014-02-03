<?php

namespace Brainstrap\Core\NCBundle\Form\Cart;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('keyword')
            ->add('registrationDate')
            ->add('expiresDate')
            ->add('locked')
            ->add('type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\Core\NCBundle\Entity\Cart\Cart'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'brainstrap_core_ncbundle_cart_cart';
    }
}
