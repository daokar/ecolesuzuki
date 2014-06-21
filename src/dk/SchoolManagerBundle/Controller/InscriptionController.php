<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Inscription;
use dk\SchoolManagerBundle\Form\InscriptionType;

/**
 * Inscription controller.
 *
 * @Route("/inscription")
 */
class InscriptionController extends Controller
{

    /**
     * Lists all Inscription entities.
     *
     * @Route("/", name="inscription")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Inscription')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Inscription entity.
     *
     * @Route("/", name="inscription_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Inscription:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Inscription();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inscription_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Inscription entity.
    *
    * @param Inscription $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Inscription $entity)
    {
        $form = $this->createForm(new InscriptionType(), $entity, array(
            'action' => $this->generateUrl('inscription_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Inscription entity.
     *
     * @Route("/new", name="inscription_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Inscription();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Inscription entity.
     *
     * @Route("/{id}", name="inscription_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Inscription')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscription entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Inscription entity.
     *
     * @Route("/{id}/edit", name="inscription_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Inscription')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscription entity.');
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
    * Creates a form to edit a Inscription entity.
    *
    * @param Inscription $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Inscription $entity)
    {
        $form = $this->createForm(new InscriptionType(), $entity, array(
            'action' => $this->generateUrl('inscription_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Inscription entity.
     *
     * @Route("/{id}", name="inscription_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Inscription:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Inscription')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscription entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('inscription_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Inscription entity.
     *
     * @Route("/{id}", name="inscription_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Inscription')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Inscription entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('inscription'));
    }

    /**
     * Creates a form to delete a Inscription entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inscription_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
