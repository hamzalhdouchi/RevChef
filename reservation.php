<?php 
require './db/database.php';
session_start();
$result = $connect->query("SELECT * FROM `reservation`");
if ($result && $result->num_rows > 0) {
    $reservation = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $reservation = [];
}


?>