<?php

session_start();
session_unset();
session_destroy();


header("location: http://bashirmallaali/projects/todo-list/auth/login.php");