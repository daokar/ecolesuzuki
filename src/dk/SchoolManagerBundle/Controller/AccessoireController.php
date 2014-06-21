<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Accessoire;
use dk\SchoolManagerBundle\Form\AccessoireType;

/**
 * Accessoire controller.
 *
 * @Route("/accessoire")
 */
class AccessoireController extends Controller
{

    /**
     * Lists all Accessoire entities.
     *
     * @Route("/", name="accessoire")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Accessoire')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Accessoire entity.
     *
     * @Route("/", name="accessoire_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Accessoire:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Accessoire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accessoire_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Accessoire entity.
    *
    * @param Accessoire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Accessoire $entity)
    {
        $form = $this->createForm(new AccessoireType(), $entity, array(
            'action' => $this->generateUrl('accessoire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Accessoire entity.
     *
     * @Route("/new", name="accessoire_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Accessoire();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Accessoire entity.
     *
     * @Route("/{id}", name="accessoire_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Accessoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accessoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Accessoire entity.
     *
     * @Route("/{id}/edit", name="accessoire_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Accessoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accessoire entity.');
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
    * Creates a form to edit a Accessoire entity.
    *
    * @param Accessoire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Accessoire $entity)
    {
        $form = $this->createForm(new AccessoireType(), $entity, array(
            'action' => $this->generateUrl('accessoire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Accessoire entity.
     *
     * @Route("/{id}", name="accessoire_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Accessoire:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Accessoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accessoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accessoire_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Accessoire entity.
     *
     * @Route("/{id}", name="accessoire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Accessoire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Accessoire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accessoire'));
    }

    /**
     * Creates a form to delete a Accessoire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accessoire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
