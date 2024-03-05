<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 
    if(isset($_SESSION['username'])){
        header("location: " . APPURL);
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['about'])) {
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $about = $_POST['about'];
            
            // File upload handling
            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];
            $dir = "img/" . basename($avatar);
            move_uploaded_file($avatar_tmp, $dir);
            
            $insert = $conn->prepare("INSERT INTO users (name, email, username, password, about, avatar) VALUES (:name, :email, :username, :password, :about, :avatar)");
            // In PHP verwijst de term "prepare" naar het proces van het maken van een voorbereid statement

            $insert->execute([
                ":name" => $name,
                ":email" => $email,
                ":username" => $username,
                ":password" => $password,
                ":about" => $about,
                ":avatar" => $avatar,
            ]);

            header("location: login.php");
        }
    }
?>

    <div class="container">
		<div class="row">
			<div class="col">
				<div class="main-col-register">

					<div class="block-register">
						<form role="form" enctype="multipart/form-data" method="post" action="register.php">
							<div class="form-group">
								<label>Name*</label> <input type="text" class="form-control"
							name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
						<div class="form-group">
					<label>Choose Username*</label> <input type="text"
							class="form-control" name="username" placeholder="Create A Username">
						</div>
					<div class="form-group">
					<label>Password*</label> <input type="password" class="form-control"
				name="password" placeholder="Enter A Password">
				</div>
				<div class="form-group">
		<label>Confirm Password*</label> <input type="password"
			class="form-control" name="password2"
			placeholder="Enter Password Again">
			</div>
				<div class="form-group">
					<label>Upload Avatar</label>
				<input type="file" name="avatar">
				<p class="help-block"></p>
					</div>
					<div class="form-group">
					<label>About Me</label>
					<textarea id="about" rows="6" cols="80" class="form-control"
					name="about" placeholder="Tell us about yourself (Optional)"></textarea>
					</div>
			<input name="submit" type="submit" class="btn btn-danger" value="Register" />
					</form>
					</div>
				</div>
			</div>
		

			<?php include "../includes/footer.php"; ?> 

