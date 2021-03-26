<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_product_crud', 'root', 'lcy0200');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = $_POST['title'];
$title = $_POST['description'];
$title = $_POST['price'];

$pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="app.css" rel="stylesheet">

  <title>Products CRUD</title>
</head>
<body>
  <h1>Create new Product</h1>
  <br>


  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Product Image</label>
      <br>
      <input type="file" name="image">
    </div>
    <div class="form-group">
      <label>Product Title</label>
      <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
      <label>Product Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label>Product price</label>
      <input type="number" step=".01" name="price" class="form-control">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</body>
</html>
