<?php

namespace AppBundle\DataFixtures;

use Faker\Factory;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        
        
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            
            $category = new \AppBundle\Entity\Category();
            $category->setName($faker->text(20));
            
            $manager->persist($category);
            
            $categories[] = $category;
        }
        
        
        for ($i = 0; $i < 40; $i++) {
            
            $product = new Product();
            
            $product->setName($faker->text(30));
            $product->setPrice($faker->randomFloat(2, 5, 200));
            $product->setDescription($faker->text(250));
            $product->setCategory($faker->randomElement($categories));
            
            $manager->persist($product);
        }
        
        $manager->flush();
    }
}
