<!-- <?php
// $servername = "db";
// $username = "root";  
// $password = ""; 
// $dbname = "edoc"; 

// $database = new mysqli($servername, $username, $password, $dbname);

// if ($database->connect_error) {
//     die("Échec de la connexion : " . $database->connect_error);
// }
// ?>
 -->

<?php
$servername = "localhost";
$username = "root";
$password = "";  // your MySQL password
$dbname = "edoc";
$port = 3307;

$database = new mysqli($servername, $username, $password, $dbname, $port);

if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}
?>

