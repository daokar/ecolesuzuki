<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Presence;
use dk\SchoolManagerBundle\Form\PresenceType;

/**
 * Presence controller.
 *
 * @Route("/presence")
 */
class PresenceController extends Controller
{

    /**
     * Lists all Presence entities.
     *
     * @Route("/", name="presence")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Presence')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Presence entity.
     *
     * @Route("/", name="presence_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Presence:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Presence();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('presence_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Presence entity.
    *
    * @param Presence $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Presence $entity)
    {
        $form = $this->createForm(new PresenceType(), $entity, array(
            'action' => $this->generateUrl('presence_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Presence entity.
     *
     * @Route("/new", name="presence_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Presence();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Presence entity.
     *
     * @Route("/{id}", name="presence_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Presence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presence entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Presence entity.
     *
     * @Route("/{id}/edit", name="presence_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Presence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presence entity.');
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
    * Creates a form to edit a Presence entity.
    *
    * @param Presence $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Presence $entity)
    {
        $form = $this->createForm(new PresenceType(), $entity, array(
            'action' => $this->generateUrl('presence_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Presence entity.
     *
     * @Route("/{id}", name="presence_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Presence:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Presence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presence entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('presence_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Presence entity.
     *
     * @Route("/{id}", name="presence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Presence')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Presence entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('presence'));
    }

    /**
     * Creates a form to delete a Presence entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presence_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
