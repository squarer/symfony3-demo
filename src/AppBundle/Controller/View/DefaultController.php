<?php

namespace AppBundle\Controller\View;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
