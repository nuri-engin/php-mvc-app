<?php
    namespace app\controllers;

use app\models\Product;
use app\Router;

    class ProductController
    {
        public function index(Router $router)
        {
            $search = $_GET['search'] ?? '';
            $products = $router->db->getProducts($search);

            // Better: return $router->renderView($PATHS->PRODUCTS->index);
            // See the sample approach at '/constants/PATHS-README.md'
            return $router->renderView('products/index',[
                'products' => $products,
                'search' => $search
            ]);
        }

        public function create(Router $router)
        {
            $errors = [];
            $productData = [
                'title' => '',
                'description' => '',
                'image' => '',
                'price' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Let save the data to the Database!
                $productData['title'] = $_POST['title'];
                $productData['description'] = $_POST['description'];
                $productData['imageFile'] = $_FILES['image'] ?? null;
                $productData['price'] = (float)$_POST['price'];

                $product = new Product();
                $product->load($productData);
                $errors = $product->save();

                if (empty($errors)) {
                    header('Location /products');
                    exit;                        
                }
            }

            echo '<pre>';
            var_dump($productData);
            echo '</pre>';

            return $router->renderView('products/create', [
                'errors' => $errors,
                'product' => $productData
            ]);          
        }

        public function update()
        {
            echo "Update page";            
        }

        public function delete()
        {
            echo "Delete page";            
        }
    }
?>