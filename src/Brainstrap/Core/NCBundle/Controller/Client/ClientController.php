<?php

namespace Brainstrap\Core\NCBundle\Controller\Client;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Brainstrap\Core\NCBundle\Entity\Client\Client;
use Brainstrap\Core\NCBundle\Form\Client\ClientType;

/**
 * Client\Client controller.
 *
 */
class ClientController extends Controller
{

    /**
     * Lists all Client\Client entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->findAll();

        return $this->render('BrainstrapCoreNCBundle:Client/Client:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Client\Client entity.
     *
     */
    public function createAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $entity = new Client();
            $form = $this->createCreateForm($entity);
            $form->handleRequest($request);
            $serializer = $this->getSerializer();


            if ($form->isValid()) {
                $cartId = $form['cart_id']->getData();
                if(empty($cartId) || !is_numeric($cartId))
                {
                    $return = array("responseCode"=>500, "msg" => "Не удалось получить id карты клиента");
                }
                else
                {
                    $em = $this->getDoctrine()->getManager();
                    $entityCart = $em->getRepository('BrainstrapCoreNCBundle:Cart\Cart')->find($cartId);
                    if(!$entityCart)
                    {
                        $return = array("responseCode"=>500, "msg" => "Не удалось получить карту клиента с переданным id");
                    }
                    else
                    {
                        // Add cart to client
                        $entity->setCart($entityCart);
                        $em->persist($entity);
                        
                        // Add client to cart
                        $entityCart->setClient($entity);
                        $em->persist($entityCart);
                        
                        $em->flush();


                        $ans = array(
                                // Client
                                'clientId'      => $entity->getId(),
                                'clientName'    => $entity->getName(),
                                'clientSname'   => $entity->getSname(),
                                // Cart
                                'cartId'        => $entityCart->getId(),
                                'cartCode'      => $entityCart->getCode(),
                                
                                
                            );
                        $ans = json_encode($ans);
                        // die('plplpl');

                        // $clientName = $serializer->serialize($entity->getName(), 'json');
                        // $clientSName = $serializer->serialize($entity->getSName(), 'json');
                        $return = array("responseCode"=>200, "entity" => $ans);
                    }
                }

                // return $this->redirect($this->generateUrl('client_show', array('id' => $entity->getId())));
            }
            else
            {
                $return = array("responseCode"=>500, "msg" => "Не валидные данные");
            }
        }
        else
        {
            $return=array("responseCode"=>500, "msg"=>"Для обработка доступны только асинхронные запросы");
        }

        $return=json_encode($return);
        
        return new Response($return, 200, array('Content-Type'=>'application/json')); 

            // return $this->render('BrainstrapCoreNCBundle:Client/Client:new.html.twig', array(
            //     'entity' => $entity,
            //     'form'   => $form->createView(),
            // ));
    }

    /**
    * Creates a form to create a Client\Client entity.
    *
    * @param Client $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Client $entity)
    {
        $form = $this->createForm(new ClientType(), $entity, array(
            'action' => $this->generateUrl('client_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Client\Client entity.
     *
     */
    public function newAction()
    {
        $entity = new Client();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapCoreNCBundle:Client/Client:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client\Client entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Client\Client entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Client/Client:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Client\Client entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Client\Client entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Client/Client:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Client\Client entity.
    *
    * @param Client $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Client $entity)
    {
        $form = $this->createForm(new ClientType(), $entity, array(
            'action' => $this->generateUrl('client_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Client\Client entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Client\Client entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('client_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapCoreNCBundle:Client/Client:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Client\Client entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapCoreNCBundle:Client\Client')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Client\Client entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('client'));
    }

    /**
     * Creates a form to delete a Client\Client entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $id)))
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
}
