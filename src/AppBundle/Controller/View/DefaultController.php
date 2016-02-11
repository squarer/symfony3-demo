<?php

namespace AppBundle\Controller\View;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $productController = $this->get('app.product_api');
        $response = $productController->listAction();
        $products = json_decode($response->getContent(), true);

        return $this->render('default/portal.html.twig', ['products' => $products]);
    }
}
