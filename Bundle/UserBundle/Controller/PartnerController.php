<?php

namespace Avantages\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/partner")
 */
class PartnerController extends Controller
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
        return array();
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
     * @Route("/become", name="partner_become")
     * @Template()
     */
    public function becomeAction()
    {
        return array();
    }
}
