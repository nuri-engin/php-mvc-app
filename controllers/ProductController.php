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
                $product->save();

                header('Location: /products');
                exit;
            }

            return $router->renderView('products/create', [
                'errors' => $errors,
                'product' => $productData
            ]);          
        }
        
        public function delete(Router $router)
        {
            $id = $_POST['id'] ?? null;

            if (!$id) {
                header('Location /products');
                exit;
            }

            $router->db->deleteProduct($id);
            header('Location /products');
        }

        public function update(Router $router)
        {
            $errors = [];
            $id = $_GET['id'] ?? null;
            
            if (!$id) {
                header('Location: /products');
                exit;
            }
    
            $productData = $router->db->getProductById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productData['title'] = $_POST['title'];
                $productData['description'] = $_POST['description'];
                $productData['price'] = $_POST['price'];
                $productData['imageFile'] = $_FILES['image'] ?? null;
    
                $product = new Product();
                $product->load($productData);
                $product->save();

                if (empty($errors)) {
                    header('Location: /products');
                    exit;    
                }
            }

            $router->renderView('products/update', [
                'product' => $productData,
                'errors' => $errors
            ]);
        }
    }
?>