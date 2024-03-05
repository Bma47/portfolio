<?php
include "../includes/header.php";

include "../config/config.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("location: " . APPURL);
    exit();
}

if (isset($_POST['submit'])) {
    // Check if any required fields are empty
    if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['body'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $body = $_POST['body'];
        $user_name = $_SESSION['name'];
        $user_image = $_SESSION['user_image'];

        // Check if an image was uploaded   
        /*deze code doet het niet */

        if (!empty($_FILES['image']['tmp_name'])) {
            $uploadDir = 'upload/';
            $fileName = $_FILES['image']['name'];
            $destination = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $user_image = $destination;
            } else {
                echo "<script>alert('Failed to move the uploaded image.');</script>";
            }
        }

        $insert = $conn->prepare("INSERT INTO topic (title, category, body, user_name, user_image) VALUES (:title, :category, :body, :user_name, :user_image)");
        $insert->execute([
            ":title" => $title,
            ":category" => $category,
            ":body" => $body,
            ":user_name" => $user_name,
            ":user_image" => $user_image,
        ]);

        header("location: " . APPURL);
        exit();
        // header("location: " . APPURL);: De functie header() in PHP wordt gebruikt om HTTP-headers naar de browser te sturen
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <div class="container">
		<div class="row">
			<div class="col">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Maak een onderwerp aan</h1>
						<h4 class="pull-right"></h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" method="POST" action="create.php">
							<div class="form-group">
								<label>hoofdonderwerp</label>
								<input type="text" class="form-control" name="title" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label>Categorie</label>
								<select name="category"class="form-control">
									<option value="Realistisch">Realistisch</option>
									<option value="Fantasie" >Fantasie</option>
									<option value="Uit de geschiedenis" >Uit de geschiedenis</option>
							</select>
							</div>
								<div class="form-group">
									<label>Topic box</label>
									<textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
									<script>CKEDITOR.replace('body');</script>
								</div>
							<button type="submit" name="submit" class="btn btn-danger">Create</button>
						</form>
					</div>
				</div>
			</div>
			<?php require "../includes/footer.php"; ?>
			<?php include "../includes/footer-1.php"; ?>
