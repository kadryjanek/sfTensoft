<?php

namespace AppBundle\Controller;

use AppBundle\Product\Products;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    
    /**
     * @Route("/products", name="product_list")
     */
    public function listAction(Products $products)
    {
        return $this->render('product/list.html.twig', [
            'products'  => $products->getAll()
        ]);
    }
    
    /**
     * @Route("/products/{id}", name="product_show")
     */
    public function getAction($id, Products $products)
    {   
        try {
            return $this->render('product/item.html.twig', [
                'product'   => $products->findOr404($id)
            ]);
        } catch (NotFoundHttpException $e) {
            
            $this->addFlash('notice', "Ups, produkt nie istnieje");
            
            return $this->redirectToRoute('product_list');
        }
    }

}
