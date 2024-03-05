<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


	if(!isset($_SESSION['username'])){

	header("location: " .APPURL. "");
	}



    if(isset($_GET['id'])){
        $id = $_GET['id'];

    $select = $conn->query("SELECT * FROM topic WHERE id='$id'");
    $select->execute();
            // In PHP verwijst de term "prepare" naar het proces van het maken van een voorbereid statement

    $topic = $select->fetch(PDO::FETCH_OBJ);  


    if($topic->user_name !== $_SESSION['username']){

        header("location: ".APPURL."");

        }
    }



	if(isset($_POST['submit'])){
		if(empty($_POST['title']) || empty($_POST['category']) || empty($_POST['body'])) {
			echo "<script>alert('One or more inputs are empty');</script>";
		} else {

	
		$title = $_POST['title'];
		$category = $_POST['category'];
		$body = $_POST['body'];
		$user_name = $_SESSION['name'];
		
		$update = $conn->prepare("UPDATE topic SET title = :title , category = :category, body = :body, user_name = :user_name WHERE id = :id");
            // In PHP verwijst de term "prepare" naar het proces van het maken van een voorbereid statement

		$update->execute([
			":title" => $title,
			":category" => $category,
			":body" => $body,
			":user_name" => $user_name,
			":id" => $id
		]);
		
        
		
		header("location: ".APPURL."");
	}

	}	
?>
    <div class="container">
		<div class="row">
			<div class="col">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Create A Topic</h1>
						<h4 class="pull-right"></h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" method="POST" action="update.php?id=<?php echo $id; ?>">
							<div class="form-group">
								<label>onderwerp</label>
								<input type="text" value="<?php echo $topic->title;?>" class="form-control" name="title" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label>Categorie</label>
								<select name="category"class="form-control">
								<option value="Gaming">PC</option>
									<option value="playstation" >Playstation</option>
									<option value="xbox" >xbox</option>
							</select>
							</div>
								<div class="form-group">
									<label>Topic box</label>
									<textarea id="body" rows="10" cols="80" class="form-control" name="body"><?php echo $topic->body;?></textarea>
									<script>CKEDITOR.replace('body');</script>
								</div>
							<button type="submit" name="submit" class="btn btn-danger">Update</button>
						</form>
					</div>
				</div>
			</div>
			<?php require "../includes/footer.php"; ?>
			<?php include "../includes/footer-1.php"; ?>
