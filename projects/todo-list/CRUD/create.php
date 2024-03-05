<?php 
require ('../database/config.php');


if (isset($_POST['save'])) {
    $user_id = $_GET['id'];
    $task = $_POST["task"];
    $from_dt = $_POST['from_dt'];
    $to_dt = $_POST['to_dt'];
    


    $sql = $conn->prepare('INSERT INTO todos (user_id, task, from_dt, to_dt) VALUES (:user_id, :task, :from_dt, :to_dt)');

    $sql->execute([
        ":user_id" => $user_id,
        ":task" => $task,
        ":from_dt" => $from_dt,
        ":to_dt" => $to_dt
        
    ]);

    header('location: ../index.php');
}



?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>">
</head>
<body>
    
<div class="container">
<div class="line">
<li><i class="fa-solid fa-battery-half" style="color: #ffffff;"></i></i></li>
      <li><i class="fa-solid fa-wifi" style="color: #ffffff;"></i></li>
    </div>
    <div class="header">
    <h4 style=" width:100%; text-align: center;">TODO WITH API </h4>

</div>
              

                <div class="card mt-5 m-5 " style="width: 90%;">
                <h4 class="text-danger mt-3"style=" width:100%; text-align: center;">Add task</h4>

                    <div class="card-body mt-5  m-5">

                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Task</label>
                                <input type="text" name="task" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">from</label>
                                <input type="datetime-local" name="from_dt" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">to</label>
                                <input type="datetime-local" name="to_dt" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save" class="btn btn-danger">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>