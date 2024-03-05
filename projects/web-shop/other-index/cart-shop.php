<?php

include('page-content/database-.php');


$sql = "SELECT * FROM games";
$dbStatement = $dbConnection->prepare($sql);
// Preparation = Voorbereiding
$dbStatement->execute();
$games = $dbStatement->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<div class="row">
    <div class="col-lg-12 text-center border rounded bg-light my-5 text-dark">
<h1>My card</h1>
    </div>
    <div class="col-lg-8">
    <table class="table">
  <thead class="text-center" >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Aantel</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php if (!empty($game)): ?>

  <?php
echo '
<thead class="text-center">
<tr>
<td><h3>' . $game['id'] . '</h3></td>
<td><h3 class="details-title">' . $game['title'] . '</td>
<td>
<img  src="' . $game['image'] . '">
</td>
<td><p class="price">' . $game['price'] . '<span></span></p></td>
<td><p class="aantel">' . $game['aantel'] . '<span></span></p></td>
<td>Total</td>
</tr>
</thead>
';
?>

<?php endif; ?>

  </tbody>
</table>
</div>
<div class="col-lg-3">
    <div class="border bg-light rounded p-4">
        <h4>total</h4>
        <h5 class="text-right">subtotal</h5>
    </div>
</div>
</div>

</div>





</body>
</html>