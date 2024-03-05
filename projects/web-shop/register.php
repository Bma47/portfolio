<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- fonts  -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Merienda&family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
</head>
<body>
<header>

<nav class="navigation">
<a href="#" class="logo"><img src="images/logo.png" height="120" width="120"></a>

<input type="checkbox" id="check" style="display: none;">
<label  for="check"  class="checkbtn"><i class="fa-solid fa-bars"></i></label>

    <ul>
      <li><a  href="../index.php">Home<i class="h-icon fa-solid fa-house" ></i></a></li>
      <li><a  href="../index.php">Games<i class="h-icon fa-solid fa-caret-down" ></i></a>
        <ul class="dropdown">
            <li><a href="/pages/action.php">Action </a></li>
            <li><a  href="/pages/fighting.php">Fighting</a></li>
            <li><a href="/pages/sports.php"> Sports</a></li>
            <li><a href="/pages/shooter.php">Shooter</a></li>
            <li><a href="/pages/adventure.php">Adventure</a></li>
            <li><a href="/pages/cars.php">racing car </a></li>

        </ul>
        </li>
      <li> <a  href="contact.php">Contact<i class="h-icon fa-brands fa-wpforms" ></i></i></a></li>
      <li><a  href="#">Shopping <i class="h-icon fa-solid fa-bag-shopping"></i></a></li>
      <li><a  href="#">Account <i class="h-icon fa-solid fa-caret-down" ></i></a>
        <ul class="dropdown">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">registeren</a></li>
            <li><a href="logout.php">logout</a></li>

        </ul>
        </li>
   </ul>
   </nav>
</header>
    <div class="container-1">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="register.php" method="post">
            <div class="form-group">full name
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">Email
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">wachtwoord
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">herhaal wachtwoord
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="register" name="submit">
            </div>
        </form>
        <div>
        <div><p class="register-text" style="text-align:center;">Already registered <a href="login.php"><br>Login Here</a></p></div>
      </div>
    </div>
</body>
</html>