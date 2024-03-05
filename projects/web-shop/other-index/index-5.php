<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "webshop");

if (isset($_POST['add_to_cart'])) {
    if (isset($_POST['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "id");

        if (!in_array($_GET['id'], $session_array_id)) {
            $session_array = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            );

            $_SESSION['cart'][] = $session_array;

        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-2">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-md-12">
                        <div class="row">
                            <h2 class="text-center">Shopping cart</h2>
                            <?php
                            $query = "SELECT * FROM cart_item";
                            $result = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_array($result)) { ?>
                                <form method="get" action="index.php?id=<?= $row['id'] ?>">
                                    <div class="col-md-4">
                                        <img class="card-img-top" src="images/<?= $row['image'] ?>" >
                                        <h2 class="text-center"><?= $row['name']; ?></h2>
                                        <h2 class="text-center"><?= number_format($row['price'], 2); ?></h2>
                                        <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                        <input type="number" name="quantity" value="1" class="form-control">
                                        <button type="submit" class="btn btn-info" value="add_to_cart">Add to cart</button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h2 class="text-center">Items Selected</h2>
                    <?php
                    $output = "
                    <table class='table table-bordered table-striped'>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    ";

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $output .= "
                            <tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['price'] . "</td>
                                <td>" . $value['quantity'] . "</td>
                                <td>$" . number_format($value['price'] * $value['quantity'], 2) . "</td>
                                <td>
                                    <a href='index.php?action=removed&id=" . $value['id'] . "'>
                                        <button class='btn btn-danger btn-block'>Remove</button>
                                    </a>
                                </td>
                            ";
                        }

                        $output .= "
                            <tr>
                                <td colspan='4'></td>
                                <td><b>Total</b></td>
                                <td>" . number_format($total, 2) . "</td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <a href='index.php?action=removed&id=" . $value['id'] . "'>
                                        <button class='btn btn-danger btn-block'>Clear All</button>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }

                    $output .= "</table>";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php

if(isset($_GET['action'])){

    if($_GET['action'] == clearall){
        unset($_SESSION ['cart']);
}

    if($_GET['action'] == remove){

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($value['id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);


            }

    }
}
}
?>

</body>

</html>
