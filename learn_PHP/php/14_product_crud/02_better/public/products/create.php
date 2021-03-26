<?php

require_once "../../functions.php";
$pdo = require_once "../../database.php";

$errors = [];

$title = '';
$description = '';
$price = '';
$product = [
  'image' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  require_once "../../validate_product.php";

  if (empty($errors)) {
    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', date('Y-m-d H:i:s'));

    $statement->execute();
    header('Location: index.php');
  }
}

?>

<?php include_once "../../views/partials/header.php" ?>

  <p>
    <a href="index.php" class="btn btn-default">< Back to products</a>
  </p>
  <h2>Create new Product</h2>
  <br>

<?php include_once "../../views/products/form.php" ?>

<?php include_once "../../views/partials/tail.php" ?>
