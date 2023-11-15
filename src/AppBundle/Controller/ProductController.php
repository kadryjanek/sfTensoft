<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Product\Products;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    
    /**
     * @Route("/products", name="product_list")
     */
    public function listAction(Products $products, Request $request)
    {
        /*
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->createQueryBuilder('p')
            ->select(['p', 'c'])
            ->innerJoin('p.category', 'c')
            ->getQuery()
            ->getResult();
        
        $products = $this->getDoctrine()->getRepository(Product::class)
            ->findAllJoinCategory();
         */
        
        return $this->render('product/list.html.twig', [
            'products'  => $products->getAll(),
            'page'      => $request->query->get('page', 1)
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
