<?php
session_start();

$page_title = 'Webshop';

if (!isset($_SESSION["user"])) {
	header("Location: login.php");
 }


$dbHost = '127.0.0.1';
$dbName = 'webshop';
$dbUser = 'root';
$dbPass = '';

$dbConnection = null;
$dbStatement = null;

try {
	$dbConnection = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
} catch(PDOException $error) {
 
}

$sql = "SELECT * FROM games";
$dbStatement = $dbConnection->prepare($sql);

$dbStatement->execute();
$games = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
   <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>" >

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- fonts  -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Merienda&family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
<body>

<header>

    <nav class="navigation">
    <a href="" class="logo"><img src="../images/logo.png" height="120" width="120"></a>

    <input type="checkbox" id="check" style="display: none;">
    <label  for="check"  class="checkbtn"><i class="fa-solid fa-bars"></i></label>

        <ul>
        <li><a  href="../index.php">Home<i class="h-icon fa-solid fa-house" ></i></a></li>
          <li><a  href="../index.php">Games <i class="h-icon fa-solid fa-caret-down" ></i></a>
            <ul class="dropdown">
                <li><a  href="action.php">Action  </a></li>
                <li><a  href="fighting.php">Fighting</a></li>

                <li><a  href="sport.php"> Sports </a></li>
                <li><a  href="shooter.php">Shooter </a></li>
                <li><a  href="adventure.php">Adventure </a></li>
                <li><a  href="cars.php">racing car </a></li>


            </ul>
            </li>
          <li> <a  href="contact.php">Contact<i class="h-icon fa-brands fa-wpforms" ></i></i></a></li>

          <li><a  href="curssus.php">Shopping <i class="h-icon fa-solid fa-bag-shopping"></i></a></li>
          <li><a  href="#">Account <i class="h-icon fa-solid fa-caret-down" ></i></a>
            <ul class="dropdown">
            <li><a  href="../login.php">Login</a></li>
                <li><a  href="../register.php"> registeren </a></li>
                <li><a  href="../logout.php"> logout </a></li>

            </ul>
            </li>
       </ul>
       </nav>
   </header>



   
<!--   
   <section>
<div class="foto-main">
<h1 class="welkom">Welkom in mijn wereld</h1>
   <img class="main" src="../images/games/agints.png" alt="main">
   </div>
   </section> -->
   
   <h1 class="text-games">Shooter games <h1>
   <section class="section-1">
  <!-- content -->
  <div class="games-container" style="display: flex; flex-wrap: wrap;">
    <?php if(!empty($games)): ?>
      <?php foreach($games as $game): ?>
        <?php if($game['best_sold'] == 3): ?>
          <!-- card -->
          <div class="game-card" style="flex-basis: 25% margin:20px;">
            <img class="game-image" src="../images/games/<?= $game['image'] ?>">
            <h3 class="game-title"><?= $game['title'] ?></h3>
            <p class="game-description"></p>
            <div class="buy-shop">
              <a href="../details1.php?game_id=<?= $game['id'] ?>" class="buy-button">Bestel<i class="fa-solid fa-cart-shopping"></i></a>
              <p class="price"><?= $game['price'] ?><span></span></p> 
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>



<footer>
    <div class="footer-content">
      <div class="social-icons">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <div class="contact-info">
        <p>Email: bma3an@outlook.com</p>
        <p>Phone: +31 6388023907</p>
      </div>
    </div>
  </footer>
</body>
</html>


