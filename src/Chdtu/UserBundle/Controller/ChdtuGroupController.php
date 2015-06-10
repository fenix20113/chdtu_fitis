<?php

namespace Chdtu\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Chdtu\UserBundle\Entity\ChdtuGroup;
use Chdtu\UserBundle\Form\ChdtuGroupType;

/**
 * ChdtuGroup controller.
 *
 */
class ChdtuGroupController extends Controller
{

    /**
     * Lists all ChdtuGroup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChdtuUserBundle:ChdtuGroup')->findAll();

        return $this->render('ChdtuUserBundle:ChdtuGroup:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ChdtuGroup entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ChdtuGroup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('group_show', array('id' => $entity->getId())));
        }

        return $this->render('ChdtuUserBundle:ChdtuGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ChdtuGroup entity.
     *
     * @param ChdtuGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ChdtuGroup $entity)
    {
        $form = $this->createForm(new ChdtuGroupType(), $entity, array(
            'action' => $this->generateUrl('group_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ChdtuGroup entity.
     *
     */
    public function newAction()
    {
        $entity = new ChdtuGroup();
        $form   = $this->createCreateForm($entity);

        return $this->render('ChdtuUserBundle:ChdtuGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ChdtuGroup entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuUserBundle:ChdtuGroup')->find($id);

        $userEntity = $em->getRepository('ChdtuUserBundle:User')->findByGroup($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChdtuGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ChdtuUserBundle:ChdtuGroup:show.html.twig', array(
            'entity'      => $entity,
            'users' => $userEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ChdtuGroup entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuUserBundle:ChdtuGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChdtuGroup entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ChdtuUserBundle:ChdtuGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ChdtuGroup entity.
    *
    * @param ChdtuGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ChdtuGroup $entity)
    {
        $form = $this->createForm(new ChdtuGroupType(), $entity, array(
            'action' => $this->generateUrl('group_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ChdtuGroup entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuUserBundle:ChdtuGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ChdtuGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('group_edit', array('id' => $id)));
        }

        return $this->render('ChdtuUserBundle:ChdtuGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ChdtuGroup entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChdtuUserBundle:ChdtuGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ChdtuGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('group'));
    }

    /**
     * Creates a form to delete a ChdtuGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('group_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
