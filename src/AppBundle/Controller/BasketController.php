<?php

namespace AppBundle\Controller;

use AppBundle\Basket\Basket;
use AppBundle\Product\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class BasketController extends Controller
{

    public function listAction()
    {
        
    }
    
    /**
     * @Route("/add-to-basket/{id}", name="add_to_basket")
     */
    public function addAction($id, Basket $basket, Products $products)
    {
        $product = $products->findOr404($id);
        
        $basket->addProduct($product);
        
        
        
    }
    
    public function removeAction($id)
    {
        
    }
}
