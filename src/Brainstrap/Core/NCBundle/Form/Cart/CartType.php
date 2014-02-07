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
            ->add('code', null, array(
                    'error_bubbling' => true,
                ))
            ->add('keyword')
            ->add('type', null, array(
                    'empty_value' => false,
                ))
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
