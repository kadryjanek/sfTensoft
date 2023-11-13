<?php


namespace AppBundle\Basket;

use Symfony\Component\HttpFoundation\Session\SessionInterface;


class Basket
{
    
    private $session;
    
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
 
    public function addProduct(array $product): void
    {
        
    }
    
    public function removeProduct(array $product): void
    {
        
    }
    
    public function clear(): void
    {
        
    }
    
    public function getTotalPrice(): float
    {
        
    }
}
