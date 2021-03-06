<?php

namespace Brainstrap\Core\NCBundle\Controller\Session;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Brainstrap\Core\NCBundle\Entity\Session\PersonalSession;
use Brainstrap\Core\NCBundle\Entity\Reports\SessionReport;

use Brainstrap\Core\NCBundle\Form\Session\PersonalSessionType;
use Brainstrap\Core\NCBundle\Form\Session\RemoveSessionType;
/**
 * Session\PersonalSession controller.
 *
 */
class PersonalSessionController extends Controller
{

    /**
     * Lists all Session\PersonalSession entities.
     *
     */
    public function indexAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->findAll();
            $entitiesArr = array("aaData"=>array());
            for ($i=0; $i < count($entities); $i++) { 
                $entity = $entities[$i];
                $entityArr = array(
                        "sessionId" => $entity->getId(),
                        "cartCode" => $entity->getCart()->getCode(),
                        "cartType" => $entity->getCart()->getType()->getCaption(),
                        "startDate" => $entity->getStartDate()->format("H:i"),
                        "clientFullName" => $entity->getCart()->getClient()->getName() . " " . $entity->getCart()->getClient()->getSname(),
                    );

                array_push($entitiesArr["aaData"], $entityArr);
            }

            $return=json_encode($entitiesArr);
        }
        else
        {
            $return=array("responseCode"=>500, "msg"=>"Для обработка доступны только асинхронные запросы");
        }
        
        return new Response($return, 200, array('Content-Type'=>'application/json'));    
    }

    /**
     * Creates a new Session\PersonalSession entity.
     *
     */
    public function createAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $entity = new PersonalSession();
            $form = $this->createCreateForm($entity);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $clientId = $form->get('client_id')->getData();
                $cartId = $form->get('cart_id')->getData();

                if (!empty($clientId) && !empty($cartId))
                {
                    $em = $this->getDoctrine()->getManager();

                    $entityCart = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($cartId);
                    
                    if(!empty($entityCart))
                    {
                        $sessionReport = new SessionReport();

                        $sessionReport->setCart($entityCart);
                        $em->persist($entity);
                        $em->flush();

                        $sessionReport->setSessionId($entity->getId());
                        $entity->setCart($entityCart);

                        $em->persist($sessionReport);
                        $em->flush();

                        $return = array("responseCode"=>200, "id" => $entity->getId());
                    }
                    else
                    {
                        $return = array("responseCode"=>500, "msg" => "Не удалось создать сессию из-за несуществующих данных");
                    }
                }
                else
                {
                    $return = array("responseCode"=>500, "msg" => "Не удалось создать сессию из-за несуществующих запрашиваемых данных");
                }
            }
            else
            {
                $formErrors = $this->getErrorsAsArray($form);
                $return = array("responseCode"=>500, "msg" => $formErrors);
            }
        }
        else
        {
            $return=array("responseCode"=>500, "msg"=>"Для обработка доступны только асинхронные запросы");
        }

        $return=json_encode($return);
        
        return new Response($return, 200, array('Content-Type'=>'application/json'));         
    }

    /**
    * Creates a form to create a Session\PersonalSession entity.
    *
    * @param PersonalSession $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PersonalSession $entity)
    {
        $form = $this->createForm(new PersonalSessionType(), $entity, array(
            'action' => $this->generateUrl('session_personalsession_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Session\PersonalSession entity.
     *
     */
    // public function newAction()
    // {
    //     $entity = new PersonalSession();
    //     $form   = $this->createCreateForm($entity);

    //     return $this->render('BrainstrapCoreNCBundle:Session/PersonalSession:new.html.twig', array(
    //         'entity' => $entity,
    //         'form'   => $form->createView(),
    //     ));
    // }

    /**
     * Finds and displays a Session\PersonalSession entity.
     *
     */
    // public function showAction($id)
    // {
    //     $em = $this->getDoctrine()->getManager();

    //     $entity = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->find($id);

    //     if (!$entity) {
    //         throw $this->createNotFoundException('Unable to find Session\PersonalSession entity.');
    //     }

    //     $deleteForm = $this->createDeleteForm($id);

    //     return $this->render('BrainstrapCoreNCBundle:Session/PersonalSession:show.html.twig', array(
    //         'entity'      => $entity,
    //         'delete_form' => $deleteForm->createView(),        ));
    // }

    /**
     * Displays a form to edit an existing Session\PersonalSession entity.
     *
     */
    // public function editAction($id)
    // {
    //     $em = $this->getDoctrine()->getManager();

    //     $entity = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->find($id);

    //     if (!$entity) {
    //         throw $this->createNotFoundException('Unable to find Session\PersonalSession entity.');
    //     }

    //     $editForm = $this->createEditForm($entity);
    //     $deleteForm = $this->createDeleteForm($id);

    //     return $this->render('BrainstrapCoreNCBundle:Session/PersonalSession:edit.html.twig', array(
    //         'entity'      => $entity,
    //         'edit_form'   => $editForm->createView(),
    //         'delete_form' => $deleteForm->createView(),
    //     ));
    // }

    /**
    * Creates a form to edit a Session\PersonalSession entity.
    *
    * @param PersonalSession $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PersonalSession $entity)
    {
        $form = $this->createForm(new PersonalSessionType(), $entity, array(
            'action' => $this->generateUrl('session_personalsession_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Session\PersonalSession entity.
     *
     */
    // public function updateAction(Request $request, $id)
    // {
    //     $em = $this->getDoctrine()->getManager();

    //     $entity = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->find($id);

    //     if (!$entity) {
    //         throw $this->createNotFoundException('Unable to find Session\PersonalSession entity.');
    //     }

    //     $deleteForm = $this->createDeleteForm($id);
    //     $editForm = $this->createEditForm($entity);
    //     $editForm->handleRequest($request);

    //     if ($editForm->isValid()) {
    //         $em->flush();

    //         return $this->redirect($this->generateUrl('session_personalsession_edit', array('id' => $id)));
    //     }

    //     return $this->render('BrainstrapCoreNCBundle:Session/PersonalSession:edit.html.twig', array(
    //         'entity'      => $entity,
    //         'edit_form'   => $editForm->createView(),
    //         'delete_form' => $deleteForm->createView(),
    //     ));
    // }
    /**
     * Deletes a Session\PersonalSession entity.
     *
     */
    public function deleteAction(Request $request)
    {
        
        if($request->isXmlHttpRequest())
        {
            
            $entity = new PersonalSession();
            $form = $this->createForm(new RemoveSessionType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid())
            {

                $sessionId = $form->get('session_id')->getData();
                $em = $this->getDoctrine()->getManager();
                $entity = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->find($sessionId);  
                if (!$entity)
                {
                    $return=array("responseCode"=>500, "msg"=>"Сессия не найдена");
                }
                else
                {
                    $sessionReport = $em->getRepository('BrainstrapCoreNCBundle:Reports\SessionReport')->getReportBySessionId($sessionId);  
                    
                    if(!$sessionReport){
                        $sessionReport = new SessionReport();
                        $sessionReport->setCart($entity->getCart());
                    }

                    $sessionReport->setEndDate(new \DateTime('now'));
                    $sessionReport->setStatusComplete($form->getData()->getStatusComplete());
                    $em->persist($sessionReport);
                    $em->remove($entity);
                    $em->flush();
                    $return=array("responseCode"=>200, "msg"=>"Сессия успешно удалена");
                }
            }
            else
            {
                $formErrors = $this->getErrorsAsArray($form);
                $return = array("responseCode"=>500, "msg" => $formErrors);
            }
        }
        else
        {
            $return=array("responseCode"=>500, "msg"=>"Для обработка доступны только асинхронные запросы");
        }

        $return=json_encode($return);
        
        return new Response($return, 200, array('Content-Type'=>'application/json'));   

        // $form = $this->createDeleteForm($id);
        // $form->handleRequest($request);

        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $entity = $em->getRepository('BrainstrapCoreNCBundle:Session\PersonalSession')->find($id);

        //     if (!$entity) {
        //         throw $this->createNotFoundException('Unable to find Session\PersonalSession entity.');
        //     }

        //     $em->remove($entity);
        //     $em->flush();
        // }

        // return $this->redirect($this->generateUrl('session_personalsession'));
    }

    /**
     * Creates a form to delete a Session\PersonalSession entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    // private function createDeleteForm($id)
    // {
    //     return $this->createFormBuilder()
    //         ->setAction($this->generateUrl('session_personalsession_delete', array('id' => $id)))
    //         ->setMethod('DELETE')
    //         ->add('submit', 'submit', array('label' => 'Delete'))
    //         ->getForm()
    //     ;
    // }

    private function getErrorsAsArray($form)
    {
        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $key => $child) {
            if ($err = $this->getErrorsAsArray($child)) {
                $errors[$key] = $err;
            }
        }
        return $errors;
    }
}
