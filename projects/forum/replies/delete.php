<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php 
    if(isset($_GET['id'])){

    $id = $_GET['id'];


    $select = $conn->query("SELECT * FROM replies WHERE id='$id'");
    $select->execute();
    // In PHP verwijst de term "prepare" naar het proces van het maken van een voorbereid statement

    $reply = $select->fetch(PDO::FETCH_OBJ);  
    if($reply->user_id !== $_SESSION['user_id']){
    header("location: ".APPURL."");
        }else{
            $delete =$conn->query("DELETE FROM replies WHERE id='$id'");
            $delete->execute();
            // In PHP verwijst de term "prepare" naar het proces van het maken van een voorbereid statement

            header("location: " .APPURL. "");
        
        }
    }

  
?>