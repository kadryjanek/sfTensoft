<?php

namespace AppBundle\Controller;

use AppBundle\Basket\Basket;
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
    public function addAction($id, Basket $basket)
    {
        $product = $this->findProduct($id);
        
        if (!$product) {
            throw $this->createNotFoundException();
        }
        $basket->addProduct($product);
        
        
        
    }
    
    public function removeAction($id)
    {
        
    }
}
