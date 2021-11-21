<?php

    namespace app;

use app\models\Product;
use PDO;

    class Database 
    {
        public \PDO $pdo;
        
        public function __construct()
        {
            // TODO: Get the connection values from constants/environments.
            // See the sample approach at '/constants/DB-README.md'
            $this->pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=products_crud', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getProducts($search = '')
        {
            if (!empty($search)) {
                // TODO: Move the SQL queries into the constants to achieve single-responsibilty approach.
                // See the sample approach at '/constants/QUERIES-README.md'
                $statment = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
                $statment->bindValue(':title', "%$search%");
            } else {
                $statment = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
            }

            $statment->execute();
            
            return $statment->fetchAll(PDO::FETCH_ASSOC); // Fetch as Associative array.
        }

        public function createProduct(Product $product)
        {
            // TODO: Use constant variables for the DB fields/properties/column names.
            // See the sample approach at '/constants/FIELDS-README.md'
            $statement = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
            $statement->bindValue(':title', $product->title);
            $statement->bindValue(':image', $product->imagePath);
            $statement->bindValue(':description', $product->description);
            $statement->bindValue(':price', $product->price);
            $statement->bindValue(':date', date('Y-m-d H:i:s'));

            $statement->execute();
        }
    }
?>