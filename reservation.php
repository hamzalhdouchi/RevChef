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
<body>
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

    <body>
        <input type="checkbox" id="menu-toggle">
        <div class="sidebar">
            <div class="side-header">
                <h3>M<span>odern</span></h3>
            </div>

            <div class="side-content">
                <div class="profile">
                    <div class="profile-img bg-img" style="background-image: url(https://intranet.youcode.ma/storage/users/profile/1049-1728486663.JPG)"></div>

                    <?php
                        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                            $now = $_SESSION['user'];
                            $name_utilisateur = htmlspecialchars($now['name_utilisateur'], ENT_QUOTES, 'UTF-8');
                        } else {
                            $name_utilisateur = "Utilisateur Invité"; 
                        }
                        ?>
                        <h4><?= $name_utilisateur ?></h4>
                        <small>Director</small>

                </div>

                <div class="side-menu">
                    <ul>
                        <li><a href="" class="active"><span class="las la-home"></span><small>Dashboard</small></a></li>
                        <li><a href="./ajouter.php"><span class="las la-clipboard-list"></span><small>Menu</small></a></li>
                        <li><a href=""><span class="las la-user-alt"></span><small>Profile</small></a></li>
                        <li><a href=""><span class="las la-envelope "></span><small>Projects</small></a></li>
                        <li><a href=""><span class="las la-shopping-cart"></span><small>Orders</small></a></li>
                        <li><a href=""><span class="las la-tasks"></span><small>Tasks</small></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">

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

            <main>
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <small>Home / Dashboard</small>
                </div>

                <div class="page-content">
                <div class="analytics">

<div class="card">
    <div class="card-head">
        <h2>107,200</h2>
        <span class="las la-user-friends"></span>
    </div>
    <div class="card-progress">
        <small>User activity this month</small>
        <div class="card-indicator">
            <div class="indicator one" style="width: 60%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>340,230</h2>
        <span class="las la-eye"></span>
    </div>
    <div class="card-progress">
        <small>Page views</small>
        <div class="card-indicator">
            <div class="indicator two" style="width: 80%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>$653,200</h2>
        <span class="las la-shopping-cart"></span>
    </div>
    <div class="card-progress">
        <small>Monthly revenue growth</small>
        <div class="card-indicator">
            <div class="indicator three" style="width: 65%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>47,500</h2>
        <span class="las la-envelope"></span>
    </div>
    <div class="card-progress">
        <small>New E-mails received</small>
        <div class="card-indicator">
            <div class="indicator four" style="width: 90%"></div>
        </div>
    </div>
</div>

</div>
                    <div class="records table-responsive">

                        <div class="record-header">
                            <div class="add">
                                <span>Entries</span>
                                <select name="" id="">
                                    <option value="">ID</option>
                                </select>
                                <button>Add record</button>
                            </div>

                            <div class="browse">
                                <input type="search" placeholder="Search" class="record-search">
                                <select name="" id="">
                                    <option value="">Status</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><span class="las la-sort"></span> name</th>
                                        <th><span class="las la-sort"></span> Date</th>
                                        <th><span class="las la-sort"></span> Time</th>
                                        <th><span class="las la-sort"></span>Number personne</th>
                                        <th><span class="las la-sort"></span>Message</th>
                                        <th><span class="las la-sort"></span>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($reservation as $row) {
                                    $id = $row['id_utilisateur'];
                                            $result = $connect->query("SELECT * FROM `utilisateur` WHERE id = $id");
                                            if ($result && $result->num_rows > 0) {
                                                $user = $result->fetch_all(MYSQLI_ASSOC);

                                            } else {
                                                $users = [];
                                            }
                                     
                                    foreach($user as $users){
                                    ?>
                                          
                                    
                                            <tr>
                                                <td><?= htmlspecialchars($row['id_reservation']) ?></td>
                                                <td>
                                                     <div class="client">
                                                        <img class="client-img bg-img" src="./assets/img/about-bg.jpg" />
                                                        <div class="client-info">

                                                            <h4> <?= htmlspecialchars($users['name_utilisateur'])?></h4>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td><?= htmlspecialchars($row['date_reservation']) ?></td>
                                                <td><?= htmlspecialchars($row['time_reservation']) ?></td>
                                                <td><?= htmlspecialchars($row['people']) ?></td>
                                                <td><?= htmlspecialchars($row['message']) ?></td>
                                                <td>
                                                     <div class="flex justify-center gap-6">
                                                       <form action="#" method="POST" class="flex gap-4">
                                                        <input type="hidden" value="<?= htmlspecialchars($row['id_reservation']) ?>" name="reservation">
                                                            <input type="hidden" value="1" name="status">
                                                            <button type="submit"  name="action" value="Accepter" class="w-full text-center flex justify-center items-center px-3 py-2 text-sm font-medium bg-green-500 text-slate-50 rounded-lg">
                                                                Accepter
                                                            </button>
                                                       </form>
                                                       <form action="#" method="POST">
                                                        <input type="hidden" value="<?= htmlspecialchars($row['id_reservation']) ?>"  name="refuse">
                                                            <input type="hidden" value="2" name="status1">
                                                            <button type="submit" name="action" value="refuser" class="w-full text-center flex justify-center items-center px-3 py-2 text-sm font-medium bg-red-500 text-slate-50 rounded-lg">
                                                            refuser
                                                            </button>
                                                        </form>
                                                    </div> 
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
                                            $action = $_POST['action'];
                                            if ($action == 'Accepter') {
                                                $status =intval( $_POST['status']);
                                                $id =  intval($_POST['reservation']);
                                                var_dump($status,$id);
                                                if(!empty($status)){
                                                    
                                                    $stmt = $connect->prepare("UPDATE reservation SET Répondre = ? WHERE id_reservation  = ?");
                                                    $stmt->bind_param("ii", $status,$id);
                                            
                                                    $stmt->execute();
                                            } 
                                            }
                                            if ($action == 'refuser')  {
                                                
                                                $status =intval( $_POST['status1']);
                                                $id =  intval($_POST['refuse']);
                                                var_dump($status,$id);
                                                if(!empty($status)){
                                                    
                                                    $stmt = $connect->prepare("UPDATE reservation SET Répondre = ? WHERE id_reservation  = ?");
                                                    $stmt->bind_param("ii", $status,$id);
                                            
                                                    $stmt->execute();
                                        }
                                            }
                                        }
                                    ?>

                            
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </main>

</body>
</html>