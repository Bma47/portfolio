<?php require "../database/config.php"; ?>

<?php
session_start();
if(isset($_SESSION['username'])){
	header("location: ../index.php");
}

if(isset($_POST['submit'])) {
  if(empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One or more inputs are empty');</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $login->bindParam(":email", $email);
    // De methode bindParam is beschikbaar in de PDO-extensie
    
    $login->execute();

    $fetch = $login->fetchAll(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {
      foreach ($fetch as $row) {
          if (password_verify($password, $row['password'])) {
              $_SESSION['username'] = $row['username'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['email'] = $row['email'];
              header("location: ../index.php");
              exit(); // Add exit() to stop the script execution
          }
      }
      echo "<script>alert('Email or password is wrong');</script>";
  }
  
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Forum&family=Merienda:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>">
</head>
<body>
   

<div class="container">
  <div class="line">
    <li><i class="fa-solid fa-battery-half" style="color: #ffffff;"></i></li>
    <li><i class="fa-solid fa-wifi" style="color: #ffffff;"></i></li>
  </div>
  <div class="header">
  <h1 class="box  text-center">Login pagina</h1>


  </div>
  <div class="row">
    <div class="col">
      <div class="main-col-login">
        <div class="block-login">
          <form role="form" method="post" action="login.php">
            <div class="form-group ">
              <label>Email Address</label>
              <input  style="width: 150%;" type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
            </div>
            <div class="form-group">
                <br>
              <label >Password</label>
              <input  style="width: 150%;" type="password" class="form-control" name="password" placeholder="Enter A Password" required>
            </div>
            <br>
            <input name="submit" type="submit" class="btn btn-danger" value="Login" />
          </form>
          <br>
          <div class="box-1 ">
    <p>if you dont have an account? <a href="register.php">register in</a>.</p>
  </div>
        </div>
      </div>
    </div>
  </div>
</div>
