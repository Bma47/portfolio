<?php
session_start();
// Database connection setup using PDO (replace with your database credentials)
try {
    define("HOST", "localhost");
    define("DBNAME", "todo-api");
    define("USER", "todo-api");
    define("PASS", "Basher1994$&");

    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch to-do items from the database
    $sql = "SELECT * FROM todos";
    $stmt = $conn->prepare($sql);
    // SQL injection Attack
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Forum&family=Merienda:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
</head>
<body>
   

 <div class="container">
    <div class="line ">
      <li><i class="fa-solid fa-battery-half" style="color: #ffffff;"></i></i></li>
      <li><i class="fa-solid fa-wifi" style="color: #ffffff;"></i></li>
    </div>
    <?php if (isset($_SESSION['username'])): ?>
    <div class="header ">
    <div class="user-profile">
    <img class="user-img" src="img/logo.png" width="80" alt="img">
        
<h5 style="color: #fff; ">
<?php echo $_SESSION['username']; ?>
        <?php endif; ?>
</h5>

</div>
<!-- <h2 class="header-text"> To Do List </h2> -->
<ul>
<li>
    <a href="auth/logout.php" method="POST">
    <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</li>

</form></li>
<div class="text">
<li><i class="fa-solid fa-gear"></i></li>
<li><i class="fa-regular fa-bell"></i></li>
</div>

</ul>
    </div>

    <h1><i class="fa fa-check"></i>My To Do List</h1>
<div id="add-todo">
    <?php
    if (isset($_SESSION["user_id"])) {
        echo '<a href="CRUD/create.php?id=' . $_SESSION["user_id"] . '">';
        echo '<i class="fa fa-plus"></i> Add an Item';
        echo '</a>';
    }
    ?>
</div>

    


<div class="col-md-5 m-5" >

<form >
<?php foreach ($tasks as $task): ?>

<div style=" width:200%;  margin:40px;  object-fit: cover;
border-radius:5px;  padding:26px;" >



<div class="card" style="align-items: center;
    align-content: center;">
<input type="checkbox" id="1" checked/><label for="1" class="todo"><?= $task['task'] ?></label>






<div>
<span><h6><?= $task['from_dt'] ?></h6></span>
<span><h6><?= $task['to_dt'] ?></h6></span>
</div>

</div>
</div>
</form>
<?php endforeach; ?>






