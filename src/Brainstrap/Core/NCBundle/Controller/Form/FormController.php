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

        return $this->render('BrainstrapCoreNCBundle:Form:modal_request_cart.html.twig', array(
                                                                                            'form' => $form->createView(),
                                                                                        ));
    }

    /**
     * Returned modal request wait
     */ 
    public function getModalRequestWaitFormAction()
    {
        return $this->render('BrainstrapCoreNCBundle:Form:modal_request_wait.html.twig');
    }

    /**
     * Returned modal created user and cart
     */ 
    public function getModalCreateClientCartFormAction()
    {
        // Форма добавляющая карту
        $cartForm = $this->createForm(new CartType());

        // Форма добавляющая пользователя
        $clientForm = $this->createForm(new ClientType('fast_create'));

        return $this->render('BrainstrapCoreNCBundle:Form:modal_add_cart_with_client.html.twig', array(
                                                                                            'cartForm'              => $cartForm->createView(),
                                                                                            'clientForm'            => $clientForm->createView(),
                                                                                        ));
    }

    /**
     * Returned modal added session
     */ 
    public function getModalAddSessionFormAction()
    {
        // Форма создания персональной сессии
        $personalSessionForm = $this->createForm(new PersonalSessionType());

        // Форма создания групповой сессии
        $groupSessionForm = $this->createForm(new GroupSessionType());

        return $this->render('BrainstrapCoreNCBundle:Form:modal_add_session.html.twig', array(
                                                                                            'personalSessionForm'   => $personalSessionForm->createView(),
                                                                                            'groupSessionForm'      => $groupSessionForm->createView()
                                                                                        ));
    }

    /**
     * Returned modal added session
     */ 
    public function getModalClientInfoFormAction()
    {

        return $this->render('BrainstrapCoreNCBundle:Form:modal_client_info.html.twig');
    }
}
