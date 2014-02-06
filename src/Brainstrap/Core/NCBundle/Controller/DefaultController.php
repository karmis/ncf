<?php

namespace Brainstrap\Core\NCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\Core\NCBundle\Form\Cart\CartRequestCodeType;
use Brainstrap\Core\NCBundle\Form\Cart\CartType;
use Brainstrap\Core\NCBundle\Form\Client\ClientType;
use Brainstrap\Core\NCBundle\Form\PersonalSessionType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	// Форма запрашивающая код карты
        $cartCodeForm = $this->createForm(new CartRequestCodeType());

        // Форма добавляющая карту
        $cartForm = $this->createForm(new CartType());

        // Форма добавляющая пользователя
        $clientForm = $this->createForm(new ClientType('fast_create'));

        // Форма создания сессии
        $personalSessionForm = $this->createForm(new PersonalSessionType());

        return $this->render('BrainstrapCoreNCBundle:Default:index.html.twig', array(
        																		'cartCodeForm' 			=> $cartCodeForm->createView(),
        																		'cartForm' 				=> $cartForm->createView(),
        																		'clientForm' 			=> $clientForm->createView(),
        																		'personalSessionForm' 	=> $personalSessionForm->createView()
        																	));
    }
}
