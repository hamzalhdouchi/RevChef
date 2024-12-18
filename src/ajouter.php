<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display|Poppins" rel="stylesheet">
<link rel="stylesheet" href="./public/style/dach.css">
<link rel="stylesheet" href="./public/style/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<div class="sidebar">
    <div class="side-header">
        <h3>M<span>odern</span></h3>
    </div>
    <div class="side-content">
        <div class="profile">
            <div class="profile-img bg-img"
                style="background-image: url(https://intranet.youcode.ma/storage/users/profile/1049-1728486663.JPG)">
            </div>
            <h4>user</h4>
        </div>
        <div class="side-menu">
            <ul>
                <li><a href="./dachbord.php"><span class="las la-home"></span><small>Dashboard</small></a></li>
                <li><a href="./ajouter.php" class="active"><span class="las la-clipboard-list"></span><small>Ajouter</small></a></li>
                <li><a href=""><span class="las la-envelope "></span><small>Profile</small></a></li>
                <li><a href=""><span class="las la-user-alt"></span><small>Projects</small></a></li>
            </ul>
        </div>
    </div>
</div>
<header>
    <div class="header-content">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
        <div class="header-menu">
            <label for=""><span class="las la-search"></span></label>
            <div class="notify-icon">
                <span class="las la-envelope"></span><span class="notify">4</span>
            </div>
            <div class="notify-icon">
                <span class="las la-bell"></span><span class="notify">3</span>
            </div>
            <div class="user">
                <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>
                <span class="las la-power-off"></span><span>Logout</span>
            </div>
        </div>
    </div>
</header>
<div class="page-header">
    <h1>Dashboard</h1>
    <small>Home / Dashboard</small>
</div>

<script src="https://cdn.tailwindcss.com"></script>

</body>
</html>
