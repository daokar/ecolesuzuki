<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Planning;
use dk\SchoolManagerBundle\Form\PlanningType;

/**
 * Planning controller.
 *
 * @Route("/planning")
 */
class PlanningController extends Controller
{

    /**
     * Lists all Planning entities.
     *
     * @Route("/", name="planning")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Planning')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Planning entity.
     *
     * @Route("/", name="planning_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Planning:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Planning();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('planning_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Planning entity.
    *
    * @param Planning $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Planning $entity)
    {
        $form = $this->createForm(new PlanningType(), $entity, array(
            'action' => $this->generateUrl('planning_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Planning entity.
     *
     * @Route("/new", name="planning_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Planning();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Planning entity.
     *
     * @Route("/{id}", name="planning_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Planning')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planning entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Planning entity.
     *
     * @Route("/{id}/edit", name="planning_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Planning')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planning entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Planning entity.
    *
    * @param Planning $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Planning $entity)
    {
        $form = $this->createForm(new PlanningType(), $entity, array(
            'action' => $this->generateUrl('planning_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Planning entity.
     *
     * @Route("/{id}", name="planning_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Planning:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Planning')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planning entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('planning_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Planning entity.
     *
     * @Route("/{id}", name="planning_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Planning')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Planning entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('planning'));
    }

    /**
     * Creates a form to delete a Planning entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planning_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
