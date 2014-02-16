<?php

namespace Brainstrap\Core\NCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportsController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrainstrapCoreNCBundle:Reports:index.html.twig', array());
    }
}
