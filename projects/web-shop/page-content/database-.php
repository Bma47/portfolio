<?php
session_start();

$page_title = 'Webshop';

if (!isset($_SESSION["user"])) {
	header("Location: login.php");

  // De functie isset in PHP wordt gebruikt om te bepalen of een variabele is ingesteld of niet.
  // Een variabele wordt beschouwd als een ingestelde variabele als deze een andere waarde heeft dan NULL.
  // Met andere woorden, 
  // je kunt ook zeggen dat de functie isset wordt gebruikt om te bepalen of je al dan niet eerder een variabele in je code hebt gebruikt.
 }


$dbHost = '127.0.0.1';
$dbName = 'webshop';
$dbUser = 'root';
$dbPass = '';

$dbConnection = null;
$dbStatement = null;

// Make connection with the database
try {
	$dbConnection = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
} catch(PDOException $error) {
  // PDO : php data opjectes
  // SQL injection
  // Prepared Statements
  // $dbHost = "localhost";  لدمج 
  // echo "Server: " . $dbHost . " is online.";
  // Server: localhost is online.
	// When error and connection can't be made is this the place to handle the error
}

$sql = "SELECT * FROM games";
$dbStatement = $dbConnection->prepare($sql);
// Preparation = Voorbereiding
$dbStatement->execute();
$games = $dbStatement->fetchAll(PDO::FETCH_ASSOC);
// FETCH_ASSOC
// associative array , Waarbij de namen van de tabelkolommen worden gebruikt als de sleutels voor de array en de waarden van elke rij de waarde zijn die aan die sleutels is gekoppeld. De waarden zijn dus toegankelijk via de kolomnamen.
?>