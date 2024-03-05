<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $topic = $conn->query("SELECT * FROM topic WHERE id='$id'");

// In PHP, een query verwijst naar een instructie of een verzoek aan een database om gegevens op te halen, bij te werken, toe te voegen of te verwijderen. 
    $topic->execute();
    // execute() is een methode die beschikbaar is op het PDOStatement-object. 
    $singleTopic = $topic->fetch(PDO::FETCH_OBJ);

    $topicCount = $conn->query("SELECT COUNT(*) AS count_topic FROM topic WHERE user_name='$singleTopic->user_name'");
    $topicCount->execute();
    // execute() is een methode die beschikbaar is op het PDOStatement-object. 

    $count = $topicCount->fetch(PDO::FETCH_OBJ);


    // grapping replies in a dynamic way
    $reply = $conn->query("SELECT * FROM replies WHERE topic_id='$id'");
    $reply->execute();
    $allReplies = $reply->fetchAll(PDO::FETCH_OBJ);


    if (isset($_POST['submit'])) {
        if (empty($_POST['reply'])) {
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {


            $reply = $_POST['reply'];
            $user_id = $_SESSION['user_id'];
            $user_image = $_SESSION['user_image'];
            $topic_id = $id;
            $user_name = $_SESSION['username'];

            $insert = $conn->prepare("INSERT INTO replies (reply, user_id, user_image, topic_id, user_name) VALUES 
            (:reply, :user_id, :user_image, :topic_id, :user_name)");
            $user_image = $_SESSION['user_image'];
    // execute() is een methode die beschikbaar is op het PDOStatement-object. 

            $insert->execute([
                ":reply" => $reply,
                ":user_id" => $user_id,
                ":user_image" => $user_image,
                ":topic_id" => $topic_id,
                ":user_name" => $user_name,
            ]);

            header("location: ".APPURL."/topics/topic.php?id=".$id."");
            /* In PHP, de header van het codefragment ("location: " . APPURL); Uitgang(); 
            wordt gebruikt om de gebruiker
            om te leiden naar een andere pagina of URL. 
            De browser volgt dan de omleiding en laadt de nieuwe pagina.
            */
            // header("location: " . APPURL);: De functie header() in PHP wordt gebruikt om HTTP-headers naar de browser te sturen
        }
    }
}
?>


<div class="container-fluid">
    <div class="row">
			<div class="col-md-8">
                <div class="main-col">
                <div class="block">
                    <h1 class="pull-left"><?php echo $singleTopic->title; ?></h1>
                    <h4 class="pull-right"></h4>
                    <div class="clearfix"></div>
                    <hr>
                    <ul id="topics">
                    <ul id="topics">
                        <li id="main-topic" class="topic topic">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="user-info">
                                        <img class="avatar pull-left" src="../img/<?php echo $singleTopic->user_image; ?>" />
                                        <ul>
                                            <li><strong><?php echo $singleTopic->user_name; ?></strong></li>
                                            <li><?php echo $count->count_topic; ?> Post</li>
                                            <li><a href="profile.php">Profile</a>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="topic-content pull-right">
                                        <p><?php echo $singleTopic->body; ?></p>
                                    </div>  
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <?php if ($singleTopic->user_name == $_SESSION['username']) : ?>
                                            <a class="btn btn-danger" href="../topics/delete.php?id=<?php echo $singleTopic->id; ?>" role="button">Delete</a>
                                            <a class="btn btn-warning" href="../topics/update.php?id=<?php echo $singleTopic->id; ?>" role="button">Update</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </li>
                        <?php foreach ($allReplies as $reply) : ?>
                            <li class="topic topic">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="user-info">
                                            <img class="avatar pull-left" src="img/<?php echo $reply->user_image; ?>" />
                                            <ul>
                                                <li><strong><?php echo $reply->user_name; ?></strong></li>
                                                <li><a href="profile.php">Profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="topic-content pull-right">
                                            <p><?php echo $reply->reply; ?></p>
                                        </div>
                                        <?php if (isset($_SESSION['username'])) : ?>
                                            <?php if ($reply->user_id == $_SESSION['user_id']) : ?>
                                                <a class="btn btn-danger" href="../replies/delete.php?id=<?php echo $reply->id; ?>" role="button">Delete</a>
                                                <a class="btn btn-warning" href="../replies/update.php?id=<?php echo $reply->id; ?>" role="button">Update</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
=                                    </div>
                                    </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <h3>Reply To Topic</h3>
                    <div class="topic">
                    <form role="form" method="POST" action="topic.php?id=<?php echo $id; ?> ">
                        <div class="form-group">
                            <textarea id="reply" rows="10" cols="80" class="form-control" name="reply"></textarea>
                            <script>
                                CKEDITOR.replace('reply');
                            </script>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    
        <?php require "../includes/footer.php"; ?>
        <?php include "../includes/footer-1.php"; ?>
