<?php
include('php-shopping.php');





?>

<!DOCTYPE html>
<html lang="nl">
<head>
<!-- meta -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $page_title ?> | Shopping cart</title>
<!-- links van css en boodstrap-->
<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- fonts  -->
<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>" >

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Merienda&family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
</head>

<body style="background:#000;">


   <div class="container">

<?php
$query = "SELECT * FROM tbl_product ORDER BY id ASC";
// The ASC command is used to sort the data returned in ascending order.
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
?>
   <!-- game 1 -->
   <div class="col-md-4">

    <form method="post" action="index.php?action=add&id=<?= $row["id"] ?> " >
    <div style=" margin:20px; border:3px solid #fff; object-fit: cover;
 border-radius:5px; margin:10px; padding:16px;" align="center">

   <div class="card">
   <img src="<?php echo $row["image"]; ?>" id=" image"class="card-img-top" style="width:250px; height:300px;"> 

<h4  style="font-size : 27px; padding: 10px; color:#fff;" class="text "><?php echo $row["name"]; ?></h4>

<h4  style="font-size : 27px;" class="text">$ <?php echo $row["price"]; ?></h4>

<input  style="text-align: center; font-size : 20px;" type="text" name="quantity" value="1" class="form-control" />

<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn1 btn-outline-danger" value="Toevoegen" />
<input value="Details"  style="margin-top:5px;" class="btn1 btn-outline-danger text-center" value="Add to Cart"/><a href="shopping-cart.php?game_id=<?= $tbl_product_id['id'] ?>"> </a>



</div>
</div>
</form>
</div>
<?php
    }
}
?>

<div style="clear:both"></div>

   <h3 class="order-text">Order Details</h3>
   <div style="padding:20px" class="table-responsive p-7">
   <table class="table table-bordered text-center mt-5">
      <tr >
      <th >Product naam</th>
		<th >aantel</th>
		<th >Price</th>
		<th >Total</th>
		<th >verwijderen</th>
         </tr>
         <?php
         if(!empty($_SESSION["shopping_cart"]))
         {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
         ?>
         <tr>
            <td><?= $values["item_name"] ?></td>
            <td><?= $values["item_quantity"] ?></td>
            <td>$ <?= $values["item_price"] ?></td>
            <td>$ <?= number_format($values["item_quantity"] * $values["item_price"], 2) ?></td>
            <td><a href="index.php?action=delete&id=<?= $values["item_id"] ?>"><span class="span">verwijderen</span></a></td>
         </tr>
         <?php
                 $total = $total + ($values["item_quantity"] * $values["item_price"]);
             }
         ?>
         <tr>
            <td colspan="3">SubTotal</td>
            <td>$ <?= number_format($total, 2) ?></td>
            <td></td>
            </tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>