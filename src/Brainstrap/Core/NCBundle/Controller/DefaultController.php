<?php

namespace Brainstrap\Core\NCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\Core\NCBundle\Form\PersonalSessionType;

use Brainstrap\Core\NCBundle\Form\Cart\CartRequestCodeType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $cartCodeForm = $this->createForm(new CartRequestCodeType());

        return $this->render('BrainstrapCoreNCBundle:Default:index.html.twig', array(
        																		'cartCodeForm' => $cartCodeForm->createView()
        																	));
    }
}
