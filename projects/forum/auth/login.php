<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if(isset($_SESSION['username'])){
	header("location: " .APPURL. "");
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

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() > 0) {
      if(password_verify($password, $fetch['password'])) {
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['name'] = $fetch['name'];
        $_SESSION['user_id'] = $fetch['id'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['user_image'] = $fetch['avatar'];

        header("location: " . APPURL."");
        exit(); // Add exit() to stop the script execution
      } else {
        echo "<script>alert('Email or password is wrong');</script>";
      }
    }
  }
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="main-col-login">
      <div class="block-login">
        
          <form role="form" method="post" action="login.php">
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter A Password">
            </div>
            <input name="submit" type="submit" class="btn btn-danger" value="Login" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
