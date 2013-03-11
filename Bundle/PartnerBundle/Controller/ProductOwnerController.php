<?php

namespace Avantages\Bundle\PartnerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Avantages\Bundle\PartnerBundle\Entity\ProductOwner;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * ProductOwner controller.
 *
 * @Route("/partner/productowner")
 */
class ProductOwnerController extends Controller
{
    /**
     * Lists all ProductOwner entities.
     *
     * @Route("/", name="partner_productowner")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AvantagesPartnerBundle:ProductOwner')->findAll();

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
     * Finds and displays a ProductOwner entity.
     *
     * @Route("/{id}/show", name="partner_productowner_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AvantagesPartnerBundle:ProductOwner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductOwner entity.');
        }


        return array(
            'entity'      => $entity,
        );
    }

}
