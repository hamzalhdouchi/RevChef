<?php
require '../project-hello/db/database.php';
session_start();
if (isset($_POST['Sign'])) {
    $name_user = trim($_POST['name_user']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $password = trim($_POST['pswd']);
}

?>


<!DOCTYPE html>
 <html>

 <head>
 	<title>Slide Navbar</title>
 	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
 	<link href="./public/style/style.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
 </head>

 <body>
 	<div class="main">
 		<input type="checkbox" id="chk" aria-hidden="true">

 		<div class="signup">
 			<form method="post" action="">
 				<label for="chk" aria-hidden="true">Sign up</label>
 				<input type="text" name="name_user" placeholder="User name" required="">
 				<input type="email" name="email" placeholder="Email" required="">
 				<input type="tel" name="telephone" placeholder="telephone" required="">
 				<input type="password" name="pswd" placeholder="Password" required="">
 				<button type="submit" name="Sign"> submit</button>
 			</form>
 		</div>

 		<div class="login">
 			<form method="POST" action="">
 				<label for="chk" aria-hidden="true">Login</label>
 				<input type="email" name="email" placeholder="Email" required="">
 				<input type="password" name="password" placeholder="Password" required="">
 				<button type="submit" name="login">Login</button>
 			</form>
 		</div>
 	</div>
 </body>

 </html>