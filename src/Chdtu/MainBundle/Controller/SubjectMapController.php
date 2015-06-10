<?php

namespace Chdtu\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Chdtu\MainBundle\Entity\SubjectMap;
use Chdtu\MainBundle\Form\SubjectMapType;

/**
 * SubjectMap controller.
 *
 */
class SubjectMapController extends Controller
{

    /**
     * Lists all SubjectMap entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChdtuMainBundle:SubjectMap')->findAll();

        return $this->render('ChdtuMainBundle:SubjectMap:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SubjectMap entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SubjectMap();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subjectmap_show', array('id' => $entity->getId())));
        }

        return $this->render('ChdtuMainBundle:SubjectMap:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SubjectMap entity.
     *
     * @param SubjectMap $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SubjectMap $entity)
    {
        $form = $this->createForm(new SubjectMapType(), $entity, array(
            'action' => $this->generateUrl('subjectmap_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SubjectMap entity.
     *
     */
    public function newAction()
    {
        $entity = new SubjectMap();
        $form   = $this->createCreateForm($entity);

        return $this->render('ChdtuMainBundle:SubjectMap:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SubjectMap entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuMainBundle:SubjectMap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubjectMap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ChdtuMainBundle:SubjectMap:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SubjectMap entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuMainBundle:SubjectMap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubjectMap entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ChdtuMainBundle:SubjectMap:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SubjectMap entity.
    *
    * @param SubjectMap $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SubjectMap $entity)
    {
        $form = $this->createForm(new SubjectMapType(), $entity, array(
            'action' => $this->generateUrl('subjectmap_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SubjectMap entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChdtuMainBundle:SubjectMap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubjectMap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('subjectmap_edit', array('id' => $id)));
        }

        return $this->render('ChdtuMainBundle:SubjectMap:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SubjectMap entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChdtuMainBundle:SubjectMap')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SubjectMap entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subjectmap'));
    }

    /**
     * Creates a form to delete a SubjectMap entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subjectmap_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
