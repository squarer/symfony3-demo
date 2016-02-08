<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/product",
     *        name = "api_product_create",
     *        requirements = {"_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $em = $this->getEntityManager();
        $request = $request->request;

        $name = trim($request->get('name'));
        $price = $request->get('price');
        $description = $request->get('description', '');

        if (!$name) {
            throw new \InvalidArgumentException('No product name specified');
        }

        if (!$price) {
            throw new \InvalidArgumentException('No product price specified');
        }

        $product = new Product();
        $product->setName($name)
            ->setPrice($price)
            ->setDescription($description);

        $em->persist($product);
        $em->flush();
        $output = $product->toArray();

        return new JsonResponse($output);
    }

    /**
     * @Route("/product/{productId}",
     *        name = "api_product",
     *        requirements = {"productId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @param Request $request
     * @param integer $productId
     * @return JsonResponse
     */
    public function getAction(Request $request, $productId)
    {
        $product = $this->findProduct($productId);
        $output = $product->toArray();

        return new JsonResponse($output);
    }

    /**
     * @Route("/product/{productId}",
     *        name = "api_product_set",
     *        requirements = {"productId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"PUT"})
     *
     * @param Request $request
     * @param integer $productId
     * @return JsonResponse
     */
    public function setAction(Request $request, $productId)
    {
        $em = $this->getEntityManager();
        $product = $this->findProduct($productId);
        $request = $request->request;
        $name = trim($request->get('name'));
        $price = $request->get('price');
        $description = $request->get('description', '');

        if (!$name) {
            throw new \InvalidArgumentException('No product name specified');
        }

        if (!$price) {
            throw new \InvalidArgumentException('No product price specified');
        }

        $product->setName($name)
            ->setPrice($price)
            ->setDescription($description);

        $em->flush();
        $output = $product->toArray();

        return new JsonResponse($output);
    }

    /**
     * @Route("/product/{productId}",
     *        name = "api_product_remove",
     *        requirements = {"productId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"DELETE"})
     *
     * @param integer $productId
     * @return JsonResponse
     */
    public function removeAction($productId)
    {
        $em = $this->getEntityManager();
        $product = $this->findProduct($productId);

        $em->remove($product);
        $em->flush();

        return new JsonResponse(['id' => $productId]);
    }

    /**
     * @param integer $productId
     * @return Product
     */
    private function findProduct($productId)
    {
        $em = $this->getEntityManager();
        $product = $em->find('AppBundle:Product', $productId);

        if (!$product) {
            throw new \RuntimeException("No product found");
        }

        return $product;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}
