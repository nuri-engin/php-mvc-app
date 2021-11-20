<?php
    namespace app\controllers;

    use app\Router;

    class ProductController
    {
        public function index(Router $router)
        {
            $search = $_GET['search'] ?? '';
            $products = $router->db->getProducts($search);

            // Better: return $router->renderView($PATHS->PRODUCTS->index);
            return $router->renderView('products/index',[
                'products' => $products,
                'search' => $search
            ]);
        }

        public function create(Router $router)
        {
            $errors = [];
            $product = [
                'title' => '',
                'description' => '',
                'image' => '',
                'price' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Let save the data to the Database!
            }

            return $router->renderView('products/create', [
                'errors' => $errors,
                'product' => $product
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