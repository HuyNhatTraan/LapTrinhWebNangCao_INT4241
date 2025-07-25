<?php
$servername = "localhost";
$username = "root";
$password = "Anhem123";

$conn = new PDO("mysql:host=$servername;dbname=HT_Tech_LTWNC", $username, $password);

try {
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>