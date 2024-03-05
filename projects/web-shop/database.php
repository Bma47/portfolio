<?php

$hostName = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbName = "webshop";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Er is iets fout gegaan;");
}
else{
echo('sucsess');
}

?>