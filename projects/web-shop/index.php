<?php
session_start();

$page_title = 'Webshop';

if (!isset($_SESSION["user"])) {
	header("Location: login.php");

  // De functie isset in PHP wordt gebruikt om te bepalen of een variabele is ingesteld of niet.
  // Een variabele wordt beschouwd als een ingestelde variabele als deze een andere waarde heeft dan NULL.
  // Met andere woorden, 
  // je kunt ook zeggen dat de functie isset wordt gebruikt om te bepalen of je al dan niet eerder een variabele in je code hebt gebruikt.
 }


$dbHost = '127.0.0.1';
$dbName = 'webshop';
$dbUser = 'root';
$dbPass = '';

$dbConnection = null;
$dbStatement = null;

// Make connection with the database
try {
	$dbConnection = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
} catch(PDOException $error) {
  // PDO : php data opjectes
  // SQL injection
  // Prepared Statements
  // $dbHost = "localhost";  لدمج 
  // echo "Server: " . $dbHost . " is online.";
  // Server: localhost is online.
	// When error and connection can't be made is this the place to handle the error
}


// associative array , Waarbij de namen van de tabelkolommen worden gebruikt als de sleutels voor de array en de waarden van elke rij de waarde zijn die aan die sleutels is gekoppeld. De waarden zijn dus toegankelijk via de kolomnamen.
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $page_title ?> | Home</title>



   <!-- links van css , boodstrap   -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="css/style.css?v=<?php echo time();?>" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- fonts  -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Merienda&family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
<body>

<header>


    <nav class="navigation">
    <a href="#" class="logo"><img src="images/logo.png" height="120" width="120"></a>

    <input type="checkbox" id="check" style="display: none;">
     <label  for="check"  class="checkbtn"><i class="fa-solid fa-bars"></i></label>


        <ul>
          <li><a  href="index.php">Home<i class="h-icon fa-solid fa-house" ></i></a></li>
       

          <li><a  href="#">Games <i class="h-icon fa-solid fa-caret-down"></i></a>
            <ul class="dropdown">
                <li><a  href="pages/action.php">Action  </a></li>
                <li><a  href="pages/fighting.php">Fighting</a></li>
                <li><a  href="pages/sport.php"> Sports </a></li>
                <li><a  href="pages/shooter.php">Shooter </a></li>
                <li><a  href="pages/adventure.php">Adventure </a></li>
                <li><a  href="pages/cars.php">racing car </a></li>
                <li><a  href="details.php">details</a></li>

                
            </ul>
            </li>
              <li> <a  href="contact.php">Contact<i class="h-icon fa-brands fa-wpforms" ></i></i></a></li>
              <!-- <li><a  href="blog.html">Blog<i class="fa-brands fa-blogger-b"></i></a></li> -->
              <li><a  href="#">Shopping <i class="h-icon fa-solid fa-bag-shopping"></i></a></li>
              <li><a  href="#">Account <i class="h-icon fa-solid fa-caret-down" ></i></a>
              <ul class="dropdown">
              <li><a  href="login.php">Login</a></li>
              <li><a  href="register.php"> registeren </a></li>
              <li><a  href="logout.php"> logout </a></li>
              </ul>
              </li>
             
                </ul>
                </nav>
                
</header>

   <section>
   <div class="foto-main"><h1 class="welkom">Welkom in mijn wereld</h1>
   <img class="main" src="images/games/agints.png" alt="main">
   </div>
   </section>
   

   <hr class="hr">
   <br>
   <h1 class="text-games">The Best Games<h1>
   <br>
   <hr class="hr">
   <br> 


   <?php include ('shopping-cart.php'); ?>



<footer>
  <div class="footer"><h4 ><i class="fa-regular fa-copyright"></i>Bashir Malla Ali</h4>
<p>Software Developer</p><h5>Alfa <span>College</span></h5>
<p>
<i class="fa-solid fa-location-dot" style="color: #fb2e01;"></i> Groningen<br>
Linnaeusplein 125, 9713GR
</p>
</div>


    <div class="footer-content">
  
      <div class="social-icons">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
      </div>

      <div class="contact-info">
        <p><i class="fa-solid fa-envelope"></i> bma3an@outlook.com</p>
        <p><i class="fa-solid fa-phone"></i> +31 6388023907</p>
      </div>
    </div>
  </footer>

  <script src="sh-kaart.js"></script>
</body>
</html>