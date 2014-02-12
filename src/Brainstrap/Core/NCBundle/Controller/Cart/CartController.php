<?php

namespace Brainstrap\Core\NCBundle\Controller\Cart;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Brainstrap\Core\NCBundle\Entity\Cart\Cart;
use Brainstrap\Core\NCBundle\Form\Cart\CartRequestCodeType;
use Brainstrap\Core\NCBundle\Form\Cart\CartType;


/**
 * Cart\Cart controller.
 *
 */
class CartController extends Controller
{

    /**
     * Lists all Cart\Cart entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->findAll();

        return $this->render('BrainstrapCoreNCBundle:Cart/Cart:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cart\Cart entity.
     *
     */
    public function createAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $entity = new Cart();
            $form = $this->createCreateForm($entity);
            $form->handleRequest($request);
            // $serializer = $this->getSerializer();

            if ($form->isValid())
            {

                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                // $entityJSON = $serializer->serialize($entity, 'json');
                $return = array("responseCode"=>200, "id" => $entity->getId());
            }
            else
            {
                $formErrors = $this->getErrorsAsArray($form);
                // die(print_r($formErrors));
                $return = array("responseCode"=>500, "msg" => $formErrors);
            }
        }
        else
        {
            $return=array("responseCode"=>500, "msg"=>"Для обработка доступны только асинхронные запросы");
        }

        $return=json_encode($return);
        
        return new Response($return, 200, array('Content-Type'=>'application/json')); 


        // return $this->render('BrainstrapCoreNCBundle:Cart/Cart:new.html.twig', array(
        //     'entity' => $entity,
        //     'form'   => $form->createView(),
        // ));
    }

    /**
    * Creates a form to create a Cart\Cart entity.
    *
    * @param Cart $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cart $entity)
    {
        $form = $this->createForm(new CartType(), $entity, array(
            'action' => $this->generateUrl('cart_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Finds and displays a Cart\Cart entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\Cart entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Cart/Cart:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Cart\Cart entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\Cart entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Cart/Cart:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cart\Cart entity.
    *
    * @param Cart $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cart $entity)
    {
        $form = $this->createForm(new CartType(), $entity, array(
            'action' => $this->generateUrl('cart_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cart\Cart entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\Cart entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cart_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapCoreNCBundle:Cart/Cart:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cart\Cart entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cart\Cart entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cart'));
    }

    /**
     * Search by cart code
     * TODO Сделать валидацию
     */
    public function searchAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $form = $this->createForm(new CartRequestCodeType(), new Cart());
            $form->handleRequest($request);

            $code = $form->getData()->getCode();
            $em = $this->getDoctrine()->getManager();
            $entityCart = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->findCartByCartCode($code);

            if($entityCart){
                $entityClient = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->findClientByCartCode($code);
                if($entityClient)
                {


                    $ans = array(
                            // Client
                            'clientId'      => $entityClient->getId(),
                            'clientName'    => $entityClient->getName(),
                            'clientSname'   => $entityClient->getSname(),
                            // Cart
                            'cartId'        => $entityCart->getId(),
                            'cartCode'      => $entityCart->getCode(),
                        );
                    
                    $ans = json_encode($ans);
                    $return=array("responseCode"=>200, "entity" => $ans);
                }
                else
                {
                    $return=array("responseCode"=>404, "msg"=>"Клиент с таким номером карты не найден", "entity" => array("code" => $code));
                }
            } else {
                $return=array("responseCode"=>404, "msg"=>"Карта не найдена", "entity" => array("code" => $code));
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
     * Creates a form to delete a Cart\Cart entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cart_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Created object serializer 
     */ 
    private function getSerializer()
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }

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
