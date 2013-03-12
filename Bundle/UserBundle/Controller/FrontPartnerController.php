<?php

namespace Avantages\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MP\Bundle\CatalogBundle\Entity\Product;
use MP\Bundle\CatalogBundle\Entity\Feature;
use MP\Bundle\CatalogBundle\Form\ProductType;
use Avantages\Bundle\UserBundle\Entity\Partner;
use Avantages\Bundle\UserBundle\Form\PartnerType;

/**
 * @Route("/partner")
 */
class FrontPartnerController extends Controller
{
    /**
     * @Route("/", name="partner")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/product/new", name="partner_product_new")
     * @Template()
     */
    public function newProductAction()
    {
        $entity = new Product();
        $entity->addFeature(new Feature());
        $form   = $this->createForm(new ProductType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * @Route("/product/create", name="partner_product_create")
     * @Template("AvantagesUserBundle:FrontPartner:newProduct.html.twig")
     */
    public function createProductAction(Request $request)
    {
        $entity = new Product();
        $entity->addFeature(new Feature());
        $form   = $this->createForm(new ProductType(), $entity);

        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'info',
                'Votre produit a bien été ajouté'
            );

            return $this->redirect($this->generateUrl('partner_product_list'));
        }

        $this->get('session')->getFlashBag()->add(
            'error',
            'Votre formulaire contient des erreurs'
        );

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * @Route("/product/list", name="partner_product_list")
     * @Template()
     */
    public function listProductAction()
    {
        return array();
    }

    /**
     * @Route("/condition", name="partner_condition")
     * @Template()
     */
    public function conditionAction()
    {
        return array();
    }

    /**
     * @Route("/new", name="partner_new")
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
     * @Route("/create", name="partner_create")
     * @Template("AvantagesUserBundle:FrontPartner:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Partner();
        $form   = $this->createForm(new PartnerType(), $entity);

        $form->bind($request);
        
        if ($form->isValid()) {
            if ($this->get('avantages.usermanager')->createPartner($entity)) {
                $this->get('session')->getFlashBag()->add(
                    'info',
                    'Votre compte a bien été créé, un mail de confirmation vous a été envoyé'
                );

                return $this->redirect($this->generateUrl('partner'));
            } else {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'Erreur lors de l\'envoi du mail'
                );                
            }                
        }

        $this->get('session')->getFlashBag()->add(
            'error',
            'Votre formulaire contient des erreurs'
        );

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
