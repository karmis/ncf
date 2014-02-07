<?php
namespace Brainstrap\Core\NCBundle\Form\Session;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class PersonalSessionType extends AbstractType
{ 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('cart_id', 'hidden', array(
                                'mapped' => false,
                            ))
        ;
    }

    public function getName()
    {
        return 'PersonalSessionType';
    }
}