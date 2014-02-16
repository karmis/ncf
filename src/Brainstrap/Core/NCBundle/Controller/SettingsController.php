<?php

namespace Brainstrap\Core\NCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingsController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrainstrapCoreNCBundle:Settings:index.html.twig', array());
    }
}
