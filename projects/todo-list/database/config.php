<?php

try {
    define("HOST", "localhost");
    define("DBNAME", "todo-api");
    define("USER", "root");
    define("PASS", "");
/* 
De waarde van een constante kan niet worden gewijzigd nadat deze is ingesteld
Constante namen hebben geen leidend dollarteken ($) nodig
Constanten zijn toegankelijk ongeacht het bereik
Constante waarden kunnen alleen strings en getallen zijn   */


$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Website is working!";
} catch (PDOException $Exception) {
    echo $Exception->getMessage();
    // echo "Website is not working.";
}
