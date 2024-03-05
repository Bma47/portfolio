

<?php 

session_start();
define("APPURL", "http://localhost/forum");
/*In PHP wordt de session_start() functie gebruikt om 
een ​​nieuwe sessie te starten of een bestaande sessie te hervatten. 
Sessies zijn een manier om gegevens over meerdere verzoeken 
of pagina's voor een bepaalde gebruiker op te slaan en op te halen.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome To Forum</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Forum&family=Merienda&display=swap" rel="stylesheet">
<link href="<?php echo APPURL; ?>../css/style.css?v=<?php echo time();?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
<section class="bg-img">
<img src="<?php echo APPURL; ?>../img/header-5.png" >
</section>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="<?php echo APPURL; ?>/index.php">
        <img class="logo" src="<?php echo APPURL; ?>../img/logo.png" style="width:100px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo APPURL; ?>../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo APPURL; ?>../verhalen.php">Verhalen</a>
          </li>
          <?php if (isset($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo APPURL;  ?>../topics/create.php">Topic</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['username'] . ' <i  style=" margin-top:-10px; font-size:25px;"class="fa-solid fa-address-card"></i>'; ?>
              </a>
              <ul class="dropdown-menu" style="color:#fff; background: #dc3545!important;">
                <li><a class="dropdown-item" style="color:#fff; background: #dc3545!important;" href="#">Profail</a></li>
                <li><a class="dropdown-item" style="color:#fff; background: #dc3545!important;" href="<?php echo APPURL; ?>/auth/logout.php">Logout</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo APPURL; ?>../auth/register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo APPURL; ?>../auth/login.php">Login</a>
            </li>
          <?php endif ; ?>
        </ul>
        
      </div>
    
  </nav>
  <!-- Navbar End -->
  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo APPURL; ?>/js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





    
  </body>
  </html>