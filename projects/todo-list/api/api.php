<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

try {
    $HOST = "localhost";  
    $USER   ="root";
    $PASS   ="";
    $DBNAME   ="todo-api";

    $conn = new PDO("mysql:host=" . $HOST . ";dbname=" . $DBNAME, $USER, $PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // haal users tabel 
    $queryUsers = $conn->query("SELECT * FROM users");
    $resultsData = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
    // haal todos table 
    $queryTodos = $conn->query("SELECT * FROM todos ");
    $todosData = $queryTodos->fetchAll(PDO::FETCH_ASSOC);
    // geef me deze array terug
    $responseData = array(
        "users" => $resultsData,
        "todos" => $todosData
    );

    http_response_code(200);  //Successful responses (200)
    echo json_encode($responseData); // De gegevens in de $responseData-array worden omgezet naar JSON-formaat en teruggestuurd naar de client.
} catch (PDOException $e) {

    http_response_code(500);  //500 - Internal Server Error || JSON-reactie met een foutmelding teruggestuurd.
    echo json_encode(array("error" => $e->getMessage()));
}

// json_encode => converteer code naar json
// json_decode => converteer json naar code




























