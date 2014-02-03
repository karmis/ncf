<?php

namespace Brainstrap\Core\NCBundle\Controller\Cart;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\Core\NCBundle\Entity\Cart\CartType;
use Brainstrap\Core\NCBundle\Form\Cart\CartTypeType;

/**
 * Cart\CartType controller.
 *
 */
class CartTypeController extends Controller
{

    /**
     * Lists all Cart\CartType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapCoreNCBundle:Cart\CartType')->findAll();

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cart\CartType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CartType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cart_type_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Cart\CartType entity.
    *
    * @param CartType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CartType $entity)
    {
        $form = $this->createForm(new CartTypeType(), $entity, array(
            'action' => $this->generateUrl('cart_type_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cart\CartType entity.
     *
     */
    public function newAction()
    {
        $entity = new CartType();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cart\CartType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\CartType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\CartType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Cart\CartType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\CartType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\CartType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cart\CartType entity.
    *
    * @param CartType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CartType $entity)
    {
        $form = $this->createForm(new CartTypeType(), $entity, array(
            'action' => $this->generateUrl('cart_type_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cart\CartType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\CartType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cart\CartType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cart_type_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapCoreNCBundle:Cart/CartType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cart\CartType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapCoreNCBundle:Cart\CartType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cart\CartType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cart_type'));
    }

    /**
     * Creates a form to delete a Cart\CartType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cart_type_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
