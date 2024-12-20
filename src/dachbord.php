<?php
session_start();
require "./db/database.php";

if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit;
}

if (isset($_POST['supprimer'])) {
    $id = intval($_POST['id']);
    if (!empty($id)) {
        $stmt = $connect->prepare("DELETE FROM `utilisateur` WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            ?>
                  
                  <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-500 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 absolute w-[50vw] top-20 rounded-lg"  role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                    Utilisateur supprimé avec succès.
                    </div>
                    <button type="button"  onclick="closeAlert()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            <?php
        } else {
            echo "Erreur lors de la suppression.";
        }
        $stmt->close();
    } else {
        echo "Erreur : ID invalide.";
    }
}

$result = $connect->query("SELECT * FROM `utilisateur`");
if ($result && $result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = [];
}

if (isset($_GET['modifecation'])) {
    $id = intval($_GET['id']);
    if (!empty($id)) {
        $stmt = $connect->prepare("SELECT * FROM `utilisateur` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $qury = $result->fetch_assoc();
        } else {
            echo "Aucun utilisateur trouvé.";
        }
        $stmt->close();
    } else {
        echo "Erreur : ID invalide.";
    }
}
?>

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
                        <li><a href="./reservation.php"><span class="las la-user-alt"></span><small>reservation</small></a></li>
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
                                        <th><span class="las la-sort"></span> CLIENT</th>
                                        <th><span class="las la-sort"></span> EMAIL</th>
                                        <th><span class="las la-sort"></span> TELEPHONE</th>
                                        <th><span class="las la-sort"></span> ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($users as $row) {
                                        
                                        if ($row['id_role'] == 2) {
                                            
                                    ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['id']) ?></td>
                                                <td>
                                                    <div class="client">
                                                        <img class="client-img bg-img" src="./assets/img/about-bg.jpg" />
                                                        <div class="client-info">
                                                            <h4><?= htmlspecialchars($row['name_utilisateur']) ?></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= htmlspecialchars($row['Email']) ?></td>
                                                <td><?= htmlspecialchars($row['telephone']) ?></td>
                                                <td>
                                                    <div class="flex justify-center gap-6">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                                            <button type="submit" name="supprimer">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <form action="#" method="get">
                                                            <input type="hidden" value="<?= htmlspecialchars($row['id']) ?>" name="id">
                                                            <button type="submit" onclick="modification()"  name="modifecation" class="w-full text-center flex justify-center items-center px-3 py-2 text-sm font-medium bg-[#CDA55E] text-slate-50 rounded-lg">
                                                                modifier
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </main>

        </div>
                        <?php
                if (isset($_POST['modifer'])) {
                    $id = $qury['id'];
                    $name_user = mysqli_real_escape_string($connect, $_POST['name_user']);
                    $Email = mysqli_real_escape_string($connect, $_POST['Email']);
                    $telephone = mysqli_real_escape_string($connect, $_POST['telephone']);
                    $password = $_POST['Password'];

                    if (!empty($name_user) && !empty($Email) && !empty($telephone) && !empty($password)) {
                        
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        
                        $stmt = $connect->prepare("UPDATE utilisateur SET name_utilisateur = ?, Email = ?, telephone = ?, password = ? WHERE id = ?");
                        $stmt->bind_param("ssssi", $name_user, $Email, $telephone, $hashed_password, $id);
                        
                        if ($stmt->execute()) {
                            ?>
                  
                            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-400 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 absolute w-[50vw] top-20 rounded-lg"  role="alert">
                              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                              </svg>
                              <div class="ms-3 text-sm font-medium">
                              loperation valide
                              </div>
                              <button type="button"  onclick="closeAlert()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                                  <span class="sr-only">Dismiss</span>
                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                  </svg>
                              </button>
                          </div>
                      <?php
                        } else {
                            echo 'ina lilah awda ada hmade';
                        }
                    }
                }
                ?>

                <div id="box" class="login-box  bg-opacity-0 hidden">
                    <h2 class="font-sans text-md font-bold">modification</h2>
                    <form method="post" action="">
                        <div class="user-box">
                            <input type="text" value="<?= htmlspecialchars($qury['name_utilisateur']) ?>" name="name_user" required>
                            <label>Username</label>
                        </div>
                        <div class="user-box">
                            <input type="email" value="<?= htmlspecialchars($qury['Email']) ?>" name="Email" required>
                            <label>Email</label>
                        </div>
                        <div class="user-box">
                            <input type="tel" value="<?= htmlspecialchars($qury['telephone']) ?>" name="telephone" required>
                            <label>Telephone</label>
                        </div>
                        <div class="user-box">
                            <input type="password" value="<?= htmlspecialchars($qury['password']) ?>" name="Password" required>
                            <label>Password</label>
                        </div>
                        <button type="submit" id="sub" name="modifer" class="w-full h-11 bg-[#22BAA0] rounded-lg text-white font-sans">Submit</button>
                    </form>
                </div>

                                    <script src="./public/js/script.js"></script>
    </body>

    </html>