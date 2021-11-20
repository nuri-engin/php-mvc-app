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

        public function create()
        {
            echo "Create page";            
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