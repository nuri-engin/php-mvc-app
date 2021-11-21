<?php

namespace app\models;

use app\Database;

class Product
{
    // TODO: Use constant variables for the DB fields/properties/column names.
    // See the sample approach at '/constants/FIELDS-README.md'
    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?float $price = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title']; // Requried field
        $this->description = $data['description'] ?? '';
        $this->price = $data['price']; // Requried field
        $this->imagePath = $data['image'] ?? null;
        $this->imageFile = $data['imageFile'] ?? null;
    }

    public function save()
    {
        $errors = [];

        if (!$this->title) {
            $errors[] = 'Product title is required!';
        }

        if (!$this->price) {
            $errors[] = 'Product price is required!';
        }

        // Ensure the required folder exist to be able to save the file.
        if(!is_dir(__DIR__.'/../public/images')) {
            mkdir(__DIR__.'/../public/images');
        }

        if (empty($errors)) {
            if ($this->imageFile && $this->imageFile['tmp_name']) {

                // Ensure products' previous file has been removed!
                if ($this->imagePath) {
                    unlink(__DIR__.'/../public/'.$this->imagePath);
                }

                // Need to be sure PATH of file should be unique
                $this->imagePath = 'images/'.randomString(8).'/'.$this->imageFile;
                
                mkdir(dirname(__DIR__.'/../public/'.$this->imagePath));
                move_uploaded_file($this->image['tmp_name'], __DIR__.'/../public/'.$this->imagePath);
            }

            $db = Database::$db;
            
            if ($this->id) {
                $db->updateProduct($this);
            } else {
                $db->createProduct($this);
            }
        }

        return $errors;
    }
}

?>