<?php
require '../project-hello/db/database.php';
session_start();

if (isset($_POST['Sign'])) {
    $name_user = trim($_POST['name_user']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $password = trim($_POST['pswd']);

    if (!empty($name_user) && !empty($email) && !empty($telephone) && !empty($password)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Use prepared statements
        $stmt = $connect->prepare("INSERT INTO utilisateur (name_utilisateur, Email, telephone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name_user, $email, $telephone, $hashed_password);

        if ($stmt->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Use prepared statements
        $stmt = $connect->prepare("SELECT * FROM utilisateur WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
		
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;

                if ($user['id_role'] == 1) {
                    header("Location: ./dachbord.php");
                } else {
                    header("Location: ./home.php");
                }
                exit();
            } else {
                ?>
                <div id="alert-border-2" class=" absolute flex items-center z-20 top-0 h-16 w-56 rounded-lg p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                    Incorrect password.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

    <?php
            }
        } else {
            ?>
            <div id="alert-border-2" class="absolute flex items-center z-20 top-0 h-16 w-56 rounded-lg p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                User not found.
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

<?php
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
?>
 <!DOCTYPE html>
 <html>

 <head>
 	<title>Slide Navbar</title>
 	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
 	<link href="./public/style/style.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 	 <script src="https://cdn.tailwindcss.com"></script> 
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