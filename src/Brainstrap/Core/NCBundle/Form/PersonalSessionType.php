<?php
namespace Brainstrap\Core\NCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class PersonalSessionType extends AbstractType
{ 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('cart', 'genemu_jqueryselect2_entity', array(
            'class' => 'Brainstrap\Core\NCUserBundle\Entity\User',
            'property' => 'fio',
        )) 
        ;
    }

    public function getName()
    {
        return 'PersonalSessionType';
    }
}