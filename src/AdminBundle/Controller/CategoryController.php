<?php


namespace AdminBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categories")
 */
class CategoryController extends Controller
{
    
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)
            ->findAll();
        
        return $this->render('admin/category/list.html.twig', [
            'categories'  => $categories,
        ]);
    }
    
    /**
     * @Route("/add")
     */
    public function addAction()
    {
        
        
    }
}
