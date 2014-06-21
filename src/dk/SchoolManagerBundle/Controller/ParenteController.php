<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use dk\SchoolManagerBundle\Entity\Parente;
use dk\SchoolManagerBundle\Form\ParenteType;

/**
 * Parente controller.
 *
 * @Route("/parente")
 */
class ParenteController extends Controller
{

    /**
     * Lists all Parente entities.
     *
     * @Route("/", name="parente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('dkSchoolManagerBundle:Parente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Parente entity.
     *
     * @Route("/", name="parente_create")
     * @Method("POST")
     * @Template("dkSchoolManagerBundle:Parente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Parente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('parente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Parente entity.
    *
    * @param Parente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Parente $entity)
    {
        $form = $this->createForm(new ParenteType(), $entity, array(
            'action' => $this->generateUrl('parente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Parente entity.
     *
     * @Route("/new", name="parente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Parente();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Parente entity.
     *
     * @Route("/{id}", name="parente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Parente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Parente entity.
     *
     * @Route("/{id}/edit", name="parente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Parente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parente entity.');
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
    * Creates a form to edit a Parente entity.
    *
    * @param Parente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Parente $entity)
    {
        $form = $this->createForm(new ParenteType(), $entity, array(
            'action' => $this->generateUrl('parente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Parente entity.
     *
     * @Route("/{id}", name="parente_update")
     * @Method("PUT")
     * @Template("dkSchoolManagerBundle:Parente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('dkSchoolManagerBundle:Parente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('parente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Parente entity.
     *
     * @Route("/{id}", name="parente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('dkSchoolManagerBundle:Parente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Parente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('parente'));
    }

    /**
     * Creates a form to delete a Parente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
