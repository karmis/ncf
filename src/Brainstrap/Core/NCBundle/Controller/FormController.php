<?php

namespace Brainstrap\Core\NCBundle\Controller\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\Core\NCBundle\Form\Cart\CartRequestCodeType;
use Brainstrap\Core\NCBundle\Form\Cart\CartType;
use Brainstrap\Core\NCBundle\Form\Client\ClientType;
use Brainstrap\Core\NCBundle\Form\Session\PersonalSessionType;
use Brainstrap\Core\NCBundle\Form\Session\GroupSessionType;


class FormController extends Controller
{
    /**
     * Returned modal request cart
     */ 
    public function getModalRequestCartFormAction()
    {
        // Форма запрашивающая код карты
        $form = $this->createForm(new CartRequestCodeType());

        return $this->render('BrainstrapCoreNCBundle:Default:modal_request_cart.html.twig', array(
                                                                                            'form' => $form->createView(),
                                                                                            )
    }
}
