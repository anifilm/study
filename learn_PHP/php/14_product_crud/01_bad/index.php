<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_product_crud', 'root', 'lcy0200');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if ($search) {
  $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title', "%$search%"); // 포함된 단어기준 검색
} else {
  $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

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
  <h1>Products CRUD</h1>
  <br>
  <p>
    <a href="create.php" type="button" class="btn btn-sm btn-success">Add Product</a>
  </p>

  <form>
    <div class="input-group mb-3">
      <input type="text" class="form-control"
             placeholder="Search for products"
             name="search" value="<?php echo $search ?>">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </div>
  </form>

  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create Date</th>
      <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $i => $product): ?>
      <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
        <td>
          <img class="product-img" src="<?php echo $product['image'] ?>" alt="">
        </td>
        <td><?php echo $product['title'] ?></td>
        <td><?php echo $product['price'] ?></td>
        <td><?php echo $product['create_date'] ?></td>
        <td>
          <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
          <form method="post" action="delete.php" style="display: inline-block">
            <input  type="hidden" name="id" value="<?php echo $product['id'] ?>"/>
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
