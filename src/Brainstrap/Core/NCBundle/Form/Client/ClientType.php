<?php

namespace Brainstrap\Core\NCBundle\Form\Client;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    private $type;
    public function __construct($type = "none")
    {
        $this->$type = $type;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('sname')
            ->add('birthday')
            ->add('cart_id', 'hidden', array(
                                    'mapped' => false,
                                ))
        ;

        // if ($this->type == "fast_create") {

        //     $builder
                
        //     ;
        // } 

        // if ($this->type !== "fast_create"){
        //     $builder->add('cart')

        //     ;
        // }

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\Core\NCBundle\Entity\Client\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'brainstrap_core_ncbundle_client_client';
    }
}
