<?php

namespace AppBundle\Product;

use AppBundle\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Products 
{
    private $doctrine;
    
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function getAll()
    {
        return $this->doctrine->getRepository(Product::class)
            ->findAllJoinCategory();
    }
    
    public function find($id): ?Product
    {
        return $this->doctrine->getRepository(Product::class)
            ->find($id);
    }
    
    public function findOr404($id): Product
    {
        $product = $this->find($id);
        if (!$product) {
            throw new NotFoundHttpException("Produkt nie znaleziony!");
        }
        return $product;
    }
}
