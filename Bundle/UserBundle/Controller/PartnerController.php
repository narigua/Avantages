<?php

namespace Avantages\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Avantages\Bundle\UserBundle\Entity\Partner;
use Avantages\Bundle\UserBundle\Form\PartnerType;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Partner controller.
 *
 * @Route("/admin/user/partner")
 */
class PartnerController extends Controller
{
    /**
     * Lists all Partner entities.
     *
     * @Route("/", name="admin_user_partner")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AvantagesUserBundle:Partner')->findAll();

        $adapter = new ArrayAdapter($entities);
        $pager = new PagerFanta($adapter);
        $pager->setMaxPerPage($this->container->getParameter('max_per_page'));

        try {
            $pager->setCurrentPage($request->query->get('page', 1));
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return array(
            'pager' => $pager,
        );
    }

    /**
     * Finds and displays a Partner entity.
     *
     * @Route("/{id}/show", name="admin_user_partner_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Partner entity.
     *
     * @Route("/new", name="admin_user_partner_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Partner();
        $form   = $this->createForm(new PartnerType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Partner entity.
     *
     * @Route("/create", name="admin_user_partner_create")
     * @Method("POST")
     * @Template("AvantagesUserBundle:Partner:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Partner();
        $form = $this->createForm(new PartnerType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been created', array(
                    '%entity%' => 'Partner',
                    '%id%'     => $entity->getId()
                ))
            );

            return $this->redirect($this->generateUrl('admin_user_partner_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Partner entity.
     *
     * @Route("/{id}/edit", name="admin_user_partner_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $editForm = $this->createForm(new PartnerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Partner entity.
     *
     * @Route("/{id}/update", name="admin_user_partner_update")
     * @Method("POST")
     * @Template("AvantagesUserBundle:Partner:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PartnerType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been updated', array(
                    '%entity%' => 'Partner',
                    '%id%'     => $entity->getId()
                ))
            );

            return $this->redirect($this->generateUrl('admin_user_partner_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Partner entity.
     *
     * @Route("/{id}/delete", name="admin_user_partner_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Partner entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'info',
                $this->get('translator')->trans('%entity%[%id%] has been deleted', array(
                    '%entity%' => 'Partner',
                    '%id%'     => $id
                ))
            );
        }

        return $this->redirect($this->generateUrl('admin_user_partner'));
    }

    /**
     * Display Partner deleteForm.
     *
     * @Template()
     */
    public function deleteFormAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * Activate Partner account.
     *
     * @Route("/user/partner/toggle/{id}", name="admin_user_partner_toggle")
     * @Template()
     */
    public function toggleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesUserBundle:Partner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partner entity.');
        }

        $productOwner = $this->get('mp.manager')->getAttachedProductOwner($entity);
        if ($entity->toggleActivation() && !$productOwner) {
            $this->createProductOwner($entity);
        }
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_user_partner'));
    }

}
