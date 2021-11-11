<?php

namespace app;

use app\models\Product;
use PDO;

class Database {
  public $pdo = null;
  public static ?Database $db = null;

  public function __construct() {
    $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_product_crud', 'root', 'lcy0200');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    self::$db = $this;
  }

  public function getProducts($search = '') {
    if ($search) {
      $statement = $this->pdo->prepare('SELECT * FROM products WHERE title like :title ORDER BY create_date DESC');
      $statement->bindValue(":title", "%$search%");
    } else {
      $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
    }
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($id) {
    $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function deleteProduct($id) {
    $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);

    return $statement->execute();
  }

  public function updateProduct(Product $product) {
    $statement = $this->pdo->prepare("UPDATE products SET
                    title = :title, 
                    image = :image, 
                    description = :description, 
                    price = :price WHERE id = :id");
    $statement->bindValue(':title', $product->title);
    $statement->bindValue(':image', $product->imagePath);
    $statement->bindValue(':description', $product->description);
    $statement->bindValue(':price', $product->price);
    $statement->bindValue(':id', $product->id);

    $statement->execute();
  }

  public function createProduct(Product $product) {
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
