<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
$page_title = 'Forum';


$topic = $conn->query("SELECT topic.id AS id, topic.title AS title, topic.category AS category,
topic.user_name AS user_name, topic.user_image AS user_image, topic.created_at AS created_at,
COUNT(replies.topic_id) AS count_replies FROM topic LEFT JOIN replies ON topic.id = replies.topic_id GROUP BY(replies.topic_id)");


// "AS" gebruikt om een ​​alias of alternatieve naam aan een kolom of tabel toe te wijzen.
/*
De FROM-clausule in SQL wordt gebruikt om de tabellen of
weergaven op te geven waaruit u gegevens wilt ophalen.
Als je rijen uit twee of meer tabellen wilt combineren op basis van een gerelateerde kolom ertussen,
kun je het sleutelwoord JOIN gebruiken.
*/
$topic->execute();

$allTopics = $topic->fetchAll(PDO::FETCH_OBJ);



?>


<!DOCTYPE html>
<html lang="nl">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link href="<?php echo APPURL; ?>/css/custom.css" rel="stylesheet">
</head>



<h1 class="welkom text-center text-danger p-5">Welkom in mijn Forum</h1>


<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left text-danger">Onderwerpen</h1>
						<h4 class="pull-right"></h4>
						<div class="clearfix"></div>
						<hr>
						<ul id="topics">
			<?php foreach ($allTopics as $topic) : ?>
			<li class="topic">
			<div class="row">
				<div class="col-md-2">
					<img class="avatar pull-left" src="img/<?php echo $topic->user_image; ?>" />
					</div>



				<div class="col-md-10">
					<div class="topic-content pull-right">
						<h3><a href="topics/topic.php?id=<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a></h3>
							<div class="topic-info">
								<a href="<?php echo APPURL; ?>/category.php"><?php echo $topic->category; ?></a> >> <a href="<?php echo APPURL; ?>/profile.php"><?php echo $topic->user_name; ?></a> >> Posted on: <?php echo $topic->created_at; ?>
								<span id="span"class="color badge pull-right"> <?php echo $topic->count_replies; ?>  <i class="fa-solid fa-comment"></i></span>
							</div>
							</div>
							</div>
						</div>
						</li>
						<?php endforeach; ?>
						</ul>
						</div>
					</div>
					</div>
					<?php include "includes/footer.php"; ?>
					<?php include "includes/footer-1.php"; ?>
