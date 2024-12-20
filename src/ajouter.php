<?php 
require './db/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_menu'])) {
    $Chef = intval(trim($_POST['Chef']));
    $name_menu = trim($_POST['name']);
    $description = htmlspecialchars(trim($_POST['Descreption']));
    $prix = floatval($_POST['prix']); 

    if (!empty($name_menu) && !empty($description) && $prix > 0) {
        
        $stmt = $connect->prepare("INSERT INTO menu (name, descreption, prix, id_utilisateur) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $name_menu, $description, $prix, $Chef);

        if ($stmt->execute()) {
            echo 'Menu ajouté avec succès !';
        } else {
            echo 'Erreur lors de l\'ajout du menu.';
        }
        $stmt->close();
    } else {
        echo 'Tous les champs sont obligatoires et le prix doit être supérieur à 0.';
    }
}


$qurey = mysqli_query($connect, "SELECT * FROM utilisateur WHERE id_role = 1");

$resulte = mysqli_query($connect, "SELECT * FROM menu");

// $data = mysqli_fetch_all($resulte);
$data = mysqli_fetch_all($resulte, MYSQLI_ASSOC);

// ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="./public/style/dach.css">
    <link rel="stylesheet" href="./public/style/form.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
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

                            $now = $_SESSION['user'] ;
                    
                    }
                    ?>
                    <h4><?= htmlspecialchars($now['name_utilisateur']) ?></h4>
                    <small>Director</small>
                </div>

            <div class="side-menu">
                <ul>
                    <li><a href="./dachbord.php"><span class="las la-home"></span><small>Dashboard</small></a></li>
                    <li><a href="./ajouter.php" class="active"><span
                                class="las la-clipboard-list"></span><small>Ajouter</small></a></li>
                                <li><a href="./reservation.php"><span class="las la-user-alt"></span><small>reservation</small></a></li>
                    <li><a href=""><span class="las la-user-alt "></span><small>Projects</small></a></li>
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

                <!-- form ajouter menu -->
             <div class="records table-responsive " id="dash_menu">

                <div class="record-header">
                    <div class="add">
                        <button onclick="menu()">Add Menu</button>
                    </div>

                    <div class="browse">
                        <input type="search" placeholder="Search" class="record-search">
                        <select name="" id="">
                            <option value="">Status</option>
                        </select>
                    </div>
                </div>
                <div id="form_menu" class=" w-screen h-screen flex justify-center  hidden">
                    <?php 
                
                    ?>
                    <div class="w-[50vw] h-[70vh] mr-[10vw] rounded-lg bg-[#000] mt-10 ">
                        <form action="#" method="POST" class=" mx-auto mt-10 w-[47vw]">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="name" id="name"
                                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                                    placeholder=" " required />
                                <label for="name"
                                    class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Menu
                                    name</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="Descreption" id="Descreption"
                                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                                    placeholder=" " required />
                                <label for="Descreption"
                                    class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descreption</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="number" name="prix" id="prix"
                                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                                    placeholder=" " required />
                                <label for="prix"
                                    class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">prix</label>
                            </div>
                            <div class="relative z-0 w-full mb-5  ">
                                <label for="floating_repeat_password"
                                class="text-lg  text-gray-500 font-semibold" >Name de Chef</label>
                               <select class="text-gray-500 w-full bg-[#CDA55E] h-10 rounded-xl mt-3" name="Chef" id="type">
                                <?php while($row = mysqli_fetch_assoc($qurey)){?>
                                <option value="<?= $row['id']?>"><?= $row['name_utilisateur'] ?></option>
                                <?php }?>
                               </select>
                              
                            </div>
                            <div class="w-[48vw] flex justify-center items-center rounded-lg">
                                <button type="submit"
                                    name="ajouter_menu" onclick="menu()" class="text-white bg-[#CDA55E] hover:bg-[#CDA55E] focus:ring-4 focus:outline-none focus:ring-[#CDA55E] font-medium rounded-lg text-lg   px-5 py-2.5 text-center dark:bg-[#CDA55E] dark:hover:bg-[#CDA55E] dark:focus:ring-[#CDA55E] w-[22vw]">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="records table-responsive">

                <?php  
if (isset($_POST['supprimer'])) {
    $id = intval($_POST['id']); 

    $stmt = $connect->prepare("DELETE FROM menu WHERE id_menu = ?");

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo 'Le menu a été supprimé avec succès.';
    } else {
        echo 'Erreur lors de la suppression du menu.';
    }

    $stmt->close();
}
?>


                    <div>
                        <table class="w-[100%]">
                            <thead>
                                <tr>
                                    <th># Id</th>
                                    <th><span class="las la-sort"></span> Menu name</th>
                                    <th><span class="las la-sort"></span> Descreption</th>
                                    <th><span class="las la-sort"></span> prix</th>
                                    
                                    <th><span class="las la-sort"></span> suprrimer</th>
                                    <th><span class="las la-sort"></span> modifier</th>
                                    <th><span class="las la-sort"></span> Ajouter Plate</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                 <?php 
                                        foreach($data as $row){
                                        ?>
                                    <td><?= $row["id_menu"]?></td>
                                    <td>
                                            
                                        <div class="client">
                                            
                                            <div class="client-info">
                                                <h4><?= $row["name"]?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $row["descreption"]?></td>
                                    <td><?= $row["prix"]?></td>
                                   

                                    <td> 
                                        <div class="flex justify-center gap-6">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $row['id_menu']; ?>">
                                                <button type="submit" name="supprimer">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="#" method="get">
                                                <input type="hidden" value="<?= $row['id_menu']; ?>" name="id">
                                                <div class=" w-10 h-10 flex justify-center items-center ml-10 ">
                                                    <button onclick="formModifier()" name="update" class="w-full h-full">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" w-10 h-10 flex justify-center items-center ml-10 border-solid border-black border-2 rounded-full">
                                            <button onclick="plate()" class="w-full h-full">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
</div>
                    <!--  affecher les plate -->
<?php
        if (isset($_POST['plate'])) {



        

        echo "<pre>";
        print_r($_POST); 
        echo "</pre>";


        // boucle sur id for
        for ($i = 0; $i < $id; $i++) { 
                $name = trim($_POST["plate_name_$i"]);
                $image_url = trim($_POST["image_url_$i"]);
                $description = trim($_POST["description_$i"]);
                $type = trim($_POST["type_$i"]);
                $menu = trim($_POST["menu"]);
                $stmt = $connect->prepare("INSERT INTO plate(name,type,description,id_menu,image) VALUES (?,?,?,?)");
                $stmt->bind_param("sisi",$name,$type,$description,$menu,$image_url);
                $stmt->execute();
            }

                 
        // hana radi dire insert avec name+cont insert into table (id) valeu (id+i
            
        }
?>
                <!-- forme ajouter plate -->
                <div>
</div>
<div id="form_plate"  class="w-screen h-screen absolute z-30 flex justify-center items-center bg-[#000] bg-opacity-40 hidden overflow-y-auto">
    <div class="w-[50vw] h-auto mr-[10vw] rounded-lg bg-[#000] bg-opacity-70 p-9" >
        <form method="POST" action="#" class="mx-auto mt-10 w-[47vw]">
            <div id="formA">
                <div  class="relative z-0 w-full mb-5 group">
                    <input type="text" name="plate_name" id="plate_name_1"
                        class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                        placeholder=" " required />
                    <label for="plate_name_1"
                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Plate name</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="file" name="image_url" id="image_url_1"
                        class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                        placeholder=" " required />
                    <label for="image_url_1"
                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Image URL</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="description" id="description_1"
                        class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                        placeholder=" " required />
                    <label for="description_1"
                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#CDA55E] peer-focus:dark:text-[#CDA55E] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Description</label>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="type_1" class="text-lg text-gray-500 font-semibold">Type</label>
                    <select class="w-full bg-[#CDA55E] h-10 rounded-xl mt-3" name="type" id="type_1">
                        <option value="1">Entrée</option>
                        <option value="2">Plat principal</option>
                        <option value="3">Dessert</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="type_1" class="text-lg text-gray-500 font-semibold">Type</label>
                    <select name="menu" class="w-full bg-[#CDA55E] h-10 rounded-xl mt-3" id="menu">
                            <?php foreach($data as $row) 
                                ?>
                            
                        <option value="<?=$row['id_menu'] ?>"><?= $row['name'] ?></option>
                    </select>
                </div>
            </div>

            <div class="w-[48vw] flex justify-around items-center rounded-lg mt-11" id="div_button">
                <button type="button" onclick="ajouterMult()" class="w-24 h-10 rounded-lg bg-slate-500">
                    <i class="fa-solid fa-plus"></i> plus
                </button>
                <button type="submit"
                name="plate"
                    class="text-white bg-[#CDA55E] hover:bg-[#CDA55E] focus:ring-4 focus:outline-none focus:ring-[#CDA55E] font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-[#CDA55E] dark:hover:bg-[#CDA55E] dark:focus:ring-[#CDA55E] w-[22vw]">
                    Submit
                </button>
            </div>
        </form>

    </div>
</div>

                <?php

                if (isset($_GET['update'])) {
                    $id = intval($_GET['id']); 
                    $stmt = $connect->prepare("SELECT * FROM menu WHERE id_menu = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $modifier = $result->fetch_assoc();
                }

                
                if (isset($_POST['modifer_menu'])) {
                    $name = trim($_POST['name']);
                    $description = htmlspecialchars(trim($_POST['descreption']));
                    $prix = floatval($_POST['prix_modifer']); 

                    if (!empty($name) && !empty($description) && $prix > 0) {
                       
                        $stmt = $connect->prepare("UPDATE menu SET name = ?, descreption = ?, prix = ? WHERE id_menu = ?");
                        $stmt->bind_param("ssdi", $name, $description, $prix, $id);
                        if ($stmt->execute()) {
                            echo "<p style='color: green;'>Menu mis à jour avec succès.</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de la mise à jour du menu.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tous les champs sont obligatoires et le prix doit être valide.</p>";
    }
}
?>

<div id="formH" class="w-screen h-screen absolute z-30 flex justify-center items-center bg-[#000] bg-opacity-40 hidden">
    <div class="w-[50vw] h-[70vh] rounded-lg bg-[#000] bg-opacity-70 p-9">
        <form action="" method="POST" class="mx-auto mt-10 w-[47vw]">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" value="<?= htmlspecialchars($modifier['name'] ?? '') ?>" id="name_modifer"
                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                    placeholder=" " required />
                <label for="name" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]">Nom du menu</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="descreption" value="<?= htmlspecialchars($modifier['descreption'] ?? '') ?>" id="Descreption"
                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                    placeholder=" " required />
                <label for="Descreption" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]">Description</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" step="0.01" name="prix_modifer" value="<?= htmlspecialchars($modifier['prix'] ?? '') ?>" id="prix"
                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-[#CDA55E] focus:outline-none focus:ring-0 focus:border-[#CDA55E] peer"
                    placeholder=" " required />
                <label for="prix" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]">Prix</label>
            </div>
            <div class="w-[48vw] flex justify-center items-center rounded-lg">
                <button type="submit" name="modifer_menu"
                    class="text-white bg-[#CDA55E] hover:bg-[#CDA55E] focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

                 <script src="./public/js/script.js"></script>
</body>

</html>