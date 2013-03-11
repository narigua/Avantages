<?php

namespace Avantages\Bundle\PartnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/partner")
 */
class FrontController extends Controller
{
    /**
     * @Route("/", name="partner_home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/discover", name="partner_discover")
     * @Template()
     */
    public function discoverAction()
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
