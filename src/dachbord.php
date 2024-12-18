<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="./public/style/dach.css">
    <link rel="stylesheet" href="./public/style/form.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="sidebar">
    <div class="side-header">
        <h3>M<span>odern</span></h3>
    </div>

    <div class="side-content">
        <div class="profile">
            <div class="profile-img bg-img" style="background-image: url(...);"></div>
            <?php
            if (isset($_SESSION['user'])) {
                $now = $_SESSION['user'];
            }
            ?>
            <h4><?= $now['name_utilisateur'] ?></h4>
            <small>Director</small>
        </div>

        <div class="side-menu">
            <ul>
                <li><a href="" class="active"><span class="las la-home"></span><small>Dashboard</small></a></li>
                <li><a href="./ajouter.php"><span class="las la-clipboard-list"></span><small>Menu</small></a></li>
                <li><a href=""><span class="las la-user-alt"></span><small>Profile</small></a></li>
                <li><a href=""><span class="las la-envelope"></span><small>Projects</small></a></li>
                <li><a href=""><span class="las la-shopping-cart"></span><small>Orders</small></a></li>
                <li><a href=""><span class="las la-tasks"></span><small>Tasks</small></a></li>
            </ul>
        </div>
    </div>
</div>