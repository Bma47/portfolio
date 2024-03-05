<?php require "../database/config.php"; ?>

<?php 


    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            
            $insert = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)");

            

            $insert->execute([
                ":name" => $name,
                ":email" => $email,
                ":username" => $username,
                ":password" => $password,
            ]);
            header("location:  http://bashirmallaali/projects/todo-list/auth/login.php");
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
    <h1 class="box  text-center">Register pagina</h1>
  </div>

		<div class="row">
			<div class="col">
				<div class="main-col-register">

					<div class="block-register">
						<form role="form" enctype="multipart/form-data" method="post" action="register.php">
							<div class="form-group">
                                <br>
								<label>Name*</label> <input type="text" class="form-control"
							name="name" placeholder="Enter Your Name">
							</div>
                            <br>

							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
                            <br>

						<div class="form-group">
					<label>Choose Username*</label> <input type="text"
							class="form-control" name="username" placeholder="Create A Username">
						</div>
                        <br>

					<div class="form-group">
                    <br>

					<label>Password*</label> <input type="password" class="form-control"
				name="password" placeholder="Enter A Password">
				</div>
				<div class="form-group">
		<label>Confirm Password*</label> <input type="password"
			class="form-control" name="password2"
			placeholder="Enter Password Again">
			</div>
            <br>

			<input name="submit" type="submit" class="btn btn-danger" value="Register" />
					</form>
                    <br>
                    <div class="box-1">
    <p>Already have an account?<a href="login.php">login</a></p>
  </div>
					</div>
				</div>
			</div>
		


