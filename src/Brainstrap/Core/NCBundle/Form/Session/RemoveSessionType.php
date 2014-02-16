<?php

namespace Brainstrap\Core\NCBundle\Form\Session;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RemoveSessionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('session_id', 'hidden', array(
                                'mapped' => false,
                                'error_bubbling' => true,
                            ))
            ->add('statusComplete', 'entity', array(
                    'class' => 'BrainstrapCoreNCBundle:Session\StatusSession',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('ss')
                            ->orderBy('ss.caption', 'DESC');
                    },
                    'empty_value' => false
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\Core\NCBundle\Entity\Session\PersonalSession'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'brainstrap_core_ncbundle_remove_session_report';
    }
}
