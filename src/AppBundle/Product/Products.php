<?php

namespace AppBundle\Product;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Products 
{
    
    public function getAll()
    {
        return [
            [
                'id'    => 1,
                'name'  => "Vacum Cleaner",
                'description'   => "Pelleproductsntesque dapibus, nisi nec vulputate porttitor, quam augue rhoncus eros, id ultrices lorem quam in quam. Praesent dapibus, nisi in feugiat volutpat, metus ante mollis ex, quis gravida ligula ex sit amet ligula. Vestibulum ut placerat tortor. Nam interdum ornare neque nec mattis. Suspendisse et enim consequat, feugiat dui non, faucibus felis. Maecenas turpis urna, tempor sit amet metus nec, feugiat auctor dolor. Maecenas vulputate, mi in feugiat dapibus, nisl erat porta nulla, at consectetur ipsum risus sed mauris. Nunc tempor vitae lectus non tempus.",
                'price' => 500,
            ], 
            [
                'id'    => 2,
                'name'  => "Cellphone",
                'description'   => "Pellentesque dapibus, nisi nec vulputate porttitor, quam augue rhoncus eros, id ultrices lorem um risus sed mauris. Nunc tempor vitae lectus non tempus.",
                'price' => 889.99,
            ], 
            [
                'id'    => 3,
                'name'  => "Laptop",
                'description'   => "Pellentesque dapibus, nisi nec vulputate porttitor, rices lorem quam in quam. Praesent dapibus, nisi in feugiat volutpat, metus ante mollis ex, quis gravida ligula ex sit amet ligula. Vestibulum ut placerat tortor. Nam interdum ornare neque nec mattis. Suspendisse et enim consequat, feugiat dui non, faucibus felis. Maecenas turpis urna, tempor sit amet metus nec, feugiat auctor dolor. Maecenas vulputate, mi in feugiat dapibus, nisl erat porta nulla, at consectetur ipsum risus sed mauris. Nunc tempor vitae lectus non tempus.",
                'price' => 1999,
            ], 
            [
                'id'    => 4,
                'name'  => "TV Samusng",
                'description'   => "Pellentesque dapibus, quam augue rhoncus eros, id ultrices lorem quam in quam. Praesent dapibus, nisi in feugiat volutpat, metus ante mollis ex, quis gravida ligula ex sit amet ligula. Vestibulum ut placerat tortor. Nam interdum ornare neque nec mattis. Suspendisse et enim consequat, feugiat dui non, faucibus felis. Maecenas turpis urna, tempor sit amet metus nec, feugiat auctor dolor. Maecenas vulputate, mi in feugiat dapibus, nisl erat porta nulla, at consectetur ipsum risus sed mauris. Nunc tempor vitae lectus non tempus.",
                'price' => 2000,
            ], 
            [
                'id'    => 5,
                'name'  => "Cofee machine",
                'description'   => "Pellentesque dapibus, nisi nec vulputate porttitor,apibus, nisi in feugiat volutpat, metus ante mollis ex, quis gravida ligula ex sit amet ligula. Vestibulum ut placerat tortor. Nam interdum ornare neque nec mattis. Suspendisse et enim consequat, feugiat dui non, faucibus felis. Maecenas turpis urna, tempor sit amet metus nec, feugiat auctor dolor. Maecenas vulputate, mi in feugiat dapibus, nisl erat porta nulla, at consectetur ipsum risus sed mauris. Nunc tempor vitae lectus non tempus.",
                'price' => 1500,
            ], 
        ];
    }
    
    public function find($id): ?array
    {
        $products = $this->getAll();
        
        foreach ($products as $product) {
            
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }
    
    public function findOr404($id): array
    {
        $product = $this->find($id);
        if (!$product) {
            throw new NotFoundHttpException("Produkt nie znaleziony!");
        }
        return $product;
    }
}
