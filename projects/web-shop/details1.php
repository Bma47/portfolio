<?php


include('page-content/navbaar.php');

include('page-content/database-.php');

$game_id = $_GET['game_id'];
$sql = "SELECT * FROM games WHERE id = :id";

$dbStatement = $dbConnection->prepare($sql);
$dbStatement->execute(array(':id' => $game_id));
$game = $dbStatement->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style-det.css?v=<?php echo time();?>" >
</head>
<body>
        

                    

    <div class="container">
    <?php if (!empty($game)): ?>

        <div class="box">
            <div class="images">
                <div class="img-holder active">
                    <img src="images/games/<?= $game['image'] ?>">
                </div>  
             
            </div>
            <div class="basic-info">
                <h1><?= $game['name'] ?></h1>
                <p class="price"><?= $game['price'] ?><span></span></p>

                <div class="options">
                    <form action="add_remove.php" method="POST"></form>
                    <a href="shopping-cart.php?game_id=<?= $game['id'] ?>">voeg toe</a>
                </div>
            </div>
            <div class="description">
            <p ><?= $game['description'] ?></p>
            <?php endif; ?>
                <ul class="social">
                    <li><a href="#"><i class="fa-brands fa-steam"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-playstation"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-xbox"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitch"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>