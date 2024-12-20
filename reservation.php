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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
