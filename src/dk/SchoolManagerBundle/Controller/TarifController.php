<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Tarif;
use dk\SchoolManagerBundle\Form\TarifType;

/**
 * Tarif controller.
 *
 * @Route("/tarif")
 */
class TarifController extends Controller
{

    /**
     * Lists all Tarif entities.
     *
     * @Route("/", name="tarif")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Tarif')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tarif entity.
     *
     * @Route("/", name="tarif_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Tarif:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tarif();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tarif_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tarif entity.
    *
    * @param Tarif $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tarif $entity)
    {
        $form = $this->createForm(new TarifType(), $entity, array(
            'action' => $this->generateUrl('tarif_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tarif entity.
     *
     * @Route("/new", name="tarif_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tarif();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tarif entity.
     *
     * @Route("/{id}", name="tarif_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Tarif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarif entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tarif entity.
     *
     * @Route("/{id}/edit", name="tarif_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Tarif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarif entity.');
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
    * Creates a form to edit a Tarif entity.
    *
    * @param Tarif $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tarif $entity)
    {
        $form = $this->createForm(new TarifType(), $entity, array(
            'action' => $this->generateUrl('tarif_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tarif entity.
     *
     * @Route("/{id}", name="tarif_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Tarif:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Tarif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarif entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tarif_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tarif entity.
     *
     * @Route("/{id}", name="tarif_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Tarif')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tarif entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tarif'));
    }

    /**
     * Creates a form to delete a Tarif entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarif_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
