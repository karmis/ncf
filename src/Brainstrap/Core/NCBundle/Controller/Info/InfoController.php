<?php

namespace Brainstrap\Core\NCBundle\Controller\Info;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InfoController extends Controller
{
    /**
     * Returned total count
     */ 
    public function totalAllAction(Request $request)
    {
        $total = array(
                'results' => array()
            );
        $total['results']['clientsCount'] = $this->totalClientAction($request, false);
        $total['results']['sessionsCount'] = $this->totalSessionAction($request, false);
        $total['responseCode'] = 200;
        $return=json_encode($total);
        return new Response($return, 200, array('Content-Type'=>'application/json')); 
    }

    /**
     * Returned total count money
     */     
    public function totalMoneyAction(Request $request, $returned = true)
    {

    }

    /**
     * Returned total count clients
     */ 
    public function totalClientAction(Request $request, $returned = true)
    {
        $em = $this->getDoctrine()->getManager();

        $count = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->getTotalActiveClients();
        

        if(!$returned){
            return $count;
        } else {
            $total = array(
                    'results' => array()
                );
            $total['results']['clientsCount'] = $count;
            $total['responseCode'] = 200;
            $return=json_encode($total);
            return new Response($return, 200, array('Content-Type'=>'application/json')); 
        }

           
    }

    /**
     * Returned total count sessions
     */ 
    public function totalSessionAction(Request $request, $returned = true)
    {
        $em = $this->getDoctrine()->getManager();

        $count = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->getTotalActiveSessions();
        
        if(!$returned){
            return $count;
        } else {
            $total = array(
                    'results' => array()
                );
            $total['results']['sessionsCount'] = $count;
            $total['responseCode'] = 200;
            $return=json_encode($total);
            return new Response($return, 200, array('Content-Type'=>'application/json')); 
        }
    }
}
