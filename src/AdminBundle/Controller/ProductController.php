<?php


namespace AdminBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductEditType;
use AppBundle\Form\ProductType;
use AppBundle\Product\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/products")
 */
class ProductController extends Controller
{
    
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)
            ->findAllJoinCategory();
        
        return $this->render('admin/product/list.html.twig', [
            'products'  => $products
        ]);
    }
    
    /**
     * @Route("/add")
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(ProductType::class);        
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $product = $form->getData();
            
            // $products->add($product);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            
            $this->addFlash('notice', "Produkt został pomyślnie zapisany!");
            
            return $this->redirectToRoute('admin_product_list');
        }
        
        return $this->render('admin/product/add.html.twig', [
            'form'  => $form->createView()
        ]);
    }
    
    /**
     * @Route("/edit/{id}")
     */
    public function editAction($id, Products $products, Request $request)
    {
        $product = $products->findOr404($id);
        
        $form = $this->createForm(ProductEditType::class, $product);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->getDoctrine()->getManager()->flush();
            
            $this->addFlash('notice', "Produkt został pomyślnie zaktualizowany!");
            
            return $this->redirectToRoute('admin_product_list');
        }
        
        return $this->render('admin/product/edit.html.twig', [
            'product'   => $product,
            'form'      => $form->createView()
        ]);
    }
    
    /**
     * @Route("/remove/{id}")
     */
    public function removeAction(Product $product)
    {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        
        $this->addFlash('notice', "Produkt został pomyślnie usunięty!");
            
        return $this->redirectToRoute('admin_product_list');
    }
}
