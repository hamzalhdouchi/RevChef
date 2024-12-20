 <?php 
session_start();
require './db/database.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$now = $_SESSION['user'];
$id_user = $now['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation'])) {

  $date = trim($_POST['date']);
  $people = intval($_POST['people']);
  $time = trim($_POST['time']);
  $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES);
  $menu = intval($_POST['menu']);
}
if (!empty($date) && !empty($people) && !empty($time) && !empty($message) && !empty($menu)) {
  // Continue processing
}
$stmt = $connect->prepare(
  "INSERT INTO reservation (date_reservation, id_utilisateur, id_menu, people, message, time_reservation) 
   VALUES (?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("siisss", $date, $id_user, $menu, $people, $message, $time);
if ($stmt->execute()) {
  // Success message
} else {
  
  echo "Erreur lors de la réservation : " . $stmt->error;
}
?>
<div id="alert-border-3" class="absolute flex items-center p-4 mb-4 text-green-600 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 top-[7vw] z-50 w-[50vw] rounded-lg" role="alert">
     <!-- Success message content  -->
</div>
<button type="button" onclick="closeAlert()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
    <span class="sr-only">Dismiss</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
</button>
<?php
$result = mysqli_query($connect, "SELECT * FROM menu");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES);

$stmt->close();

?> 

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta content="width=device-width, initial-scale=1.0" name="viewport">

 <title>Restaurantly Bootstrap Template - Index</title>
 <meta content="" name="description">
 <meta content="" name="keywords">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
 <link href="assets/vendor/aos/aos.css" rel="stylesheet">
 <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
 <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="assets/css/style.css" rel="stylesheet">

 <!-- =======================================================
 * Template Name: Restaurantly - v3.1.0
 * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 ======================================================== -->
</head>

<body>


 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
   <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

     <h1 class="logo me-auto me-lg-0"><a href="index.html">RevChef</a></h1>
     <!-- Uncomment below if you prefer to use an image logo -->
     <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

     <nav id="navbar" class="navbar order-last order-lg-0">
       <ul>
         <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
         <li><a class="nav-link scrollto" href="#about">About</a></li>
         <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
         <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
         <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
       
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->
     <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

   </div>
 </header><!-- End Header -->

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
   <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
     <div class="row">
       <div class="col-lg-8">
         <h1>Welcome to <span>RevChef</span></h1>
         <h2>Offrir une expérience unique!</h2>

         <div class="btns">
           <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
           <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
         </div>
       </div>
    

     </div>
   </div>
 </section><!-- End Hero -->

 <main id="main">

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
     <div class="container" data-aos="fade-up">

       <div class="row">
         <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
           <div class="about-img">
             <img src="assets/img/about.jpg" alt="">
           </div>
         </div>
         <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
           <h3>About RevChef.</h3>
           <p class="fst-italic">
             Offrir une expérience unique où le chef se déplace chez vous pour réaliser un show culinaire personnalisé, alliant art de la cuisine et convivialité.
           </p>
           <ul>
             <li><i class="bi bi-check-circle"></i> Réservez facilement en ligne en quelques clics seulement.</li>
             <li><i class="bi bi-check-circle"></i> Découvrez un menu complet avec photos et prix.</li>
             <li><i class="bi bi-check-circle"></i> Profitez d'offres spéciales et de réductions exclusives.</li>
           </ul>
           <p>
             Découvrez notre restaurant, un lieu où saveurs authentiques et ambiance conviviale se rencontrent. Nous proposons des plats faits maison avec des ingrédients frais et locaux, pour une expérience culinaire inoubliable qui ravira vos papilles. À bientôt !
           </p>
         </div>
       </div>

     </div>
   </section><!-- End About Section -->

   <!-- ======= Why Us Section ======= -->
   <section id="why-us" class="why-us">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Pourquoi Nous</h2>
         <p>Pourquoi choisir RevChaf</p>
       </div>

       <div class="row">

         <div class="col-lg-4">
           <div class="box" data-aos="zoom-in" data-aos-delay="100">
             <span>01</span>
             <h4>Shows culinaires personnalisés</h4>
             <p>Vivez l'art de la cuisine chez vous avec un chef qui prépare vos plats en direct, pour des moments uniques et mémorables.</p>
           </div>
         </div>

         <div class="col-lg-4 mt-4 mt-lg-0">
           <div class="box" data-aos="zoom-in" data-aos-delay="200">
             <span>02</span>
             <h4>Ingrédients de qualité premium</h4>
             <p>Nous utilisons uniquement des ingrédients frais, locaux et de haute qualité pour garantir des saveurs exceptionnelles.</p>
           </div>
         </div>

         <div class="col-lg-4 mt-4 mt-lg-0">
           <div class="box" data-aos="zoom-in" data-aos-delay="300">
             <span>03</span>
             <h4>Expérience gastronomique unique</h4>
             <p>RevChaf transforme vos repas en véritables événements, mêlant spectacle, élégance et cuisine raffinée à domicile.</p>
           </div>
         </div>

       </div>

     </div>
   </section><!-- End Why Us Section -->

   <!-- ======= Menu Section ======= -->
   <section id="menu" class="menu section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Menu</h2>
         <p>Découvrez notre menu savoureux</p>
       </div>

       <div class="row" data-aos="fade-up" data-aos-delay="100">
         <div class="col-lg-12 d-flex justify-content-center">
           <ul id="menu-flters">
             <li data-filter="*" class="filter-active">All</li>
             <li data-filter=".filter-starters">Starters</li>
             <li data-filter=".filter-salads">Salads</li>
             <li data-filter=".filter-specialty">Specialty</li>
           </ul>
         </div>
       </div>

       <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
         <?php while($row = mysqli_fetch_assoc($resulte)){ ?>
         <div class="col-lg-6 menu-item filter-starters">
           <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
           <div class="menu-content">
             <a href="#"><?= $row['name'] ?></a><span>$<?= $row['prix'] ?></span>
           </div>
           <div class="menu-ingredients">
           <?= $row['descreption'] ?>
           </div>
         </div>
           <?php }?>
        

       </div>

     </div>
   </section><!-- End Menu Section -->

   <!-- ======= Specials Section ======= -->
   <section id="specials" class="specials">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Specials</h2>
         <p>Check Our Specials</p>
       </div>

       <div class="row" data-aos="fade-up" data-aos-delay="100">
         <div class="col-lg-3">
           <ul class="nav nav-tabs flex-column">
             <li class="nav-item">
               <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Dégustation Gourmande</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" href="#tab-2"> Évasion Méditerranéenne</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" href="#tab-3"> Dîner de Prestige</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Végétarien Raffiné</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Show Culinaire à Domicile</a>
             </li>
           </ul>
         </div>
         <div class="col-lg-9 mt-4 mt-lg-0">
           <div class="tab-content">
             <div class="tab-pane active show" id="tab-1">
               <div class="row">
                 <div class="col-lg-8 details order-2 order-lg-1">
                   <h3> Dégustation Gourmande</h3>
                   <ul>
                     <li>
                       Entrée : Salade de légumes grillés et fromage de chèvre frais
                     </li>
                     <li>
                       Plat principal : Filet de saumon en croûte d’herbes, accompagné de légumes rôtis
                     </li>
                     <li>
                       Dessert : Tartelette au chocolat et fruits rouges
                     </li>
                     <li>
                       Boisson : Vin blanc frais ou cocktail maison
                     </li>
                   </ul>
                 </div>
                 <div class="col-lg-4 text-center order-1 order-lg-2">
                   <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                 </div>
               </div>
             </div>
             <div class="tab-pane" id="tab-2">
               <div class="row">
                 <div class="col-lg-8 details order-2 order-lg-1">
                   <h3>  Évasion Méditerranéenne</h3>
                   <ul>
                     <li>
                       Entrée : Hummus maison et pain pita chaud
                     </li>
                     <li>
                       Plat principal : Poulet rôti au citron et aux herbes, servi avec du couscous parfumé
                     </li>
                     <li>
                       Dessert : Baklava maison
                     </li>
                     <li>
                       Boisson : Thé à la menthe ou vin rosé
                     </li>
                   </ul>
                 </div>
                 <div class="col-lg-4 text-center order-1 order-lg-2">
                   <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                 </div>
               </div>
             </div>
             <div class="tab-pane" id="tab-3">
               <div class="row">
                 <div class="col-lg-8 details order-2 order-lg-1">
                   <h3>Dîner de Prestige</h3>
                   <ul>
                     <li>
                       Entrée : Foie gras poêlé avec compote de figues
                     </li>
                     <li>
                       Plat principal : Filet mignon en sauce au vin rouge, accompagné de purée de pommes de terre truffée
                     </li>
                     <li>
                       Dessert : Soufflé au Grand Marnier
                     </li>
                     <li>
                       Boisson : Champagne ou vin rouge corsé
                     </li>
                   </ul>
                 </div>
                 <div class="col-lg-4 text-center order-1 order-lg-2">
                   <img src="assets/img/specials-3.png" alt="" class="img-fluid">
                 </div>
               </div>
             </div>
             <div class="tab-pane" id="tab-4">
               <div class="row">
                 <div class="col-lg-8 details order-2 order-lg-1">
                   <h3> Végétarien Raffiné</h3>
                   <ul>
                     <li>
                       Entrée : Tarte tatin de légumes de saison
                     </li>
                     <li>
                       Plat principal : Risotto aux champignons sauvages et parmesan
                     </li>
                     <li>
                       Dessert : Mousse au chocolat vegan
                     </li>
                     <li>
                       Boisson : Jus frais ou thé glacé maison
                     </li>
                   </ul>
                 </div>
                 <div class="col-lg-4 text-center order-1 order-lg-2">
                   <img src="assets/img/specials-4.png" alt="" class="img-fluid">
                 </div>
               </div>
             </div>
             <div class="tab-pane" id="tab-5">
               <div class="row">
                 <div class="col-lg-8 details order-2 order-lg-1">
                   <h3>Show Culinaire à Domicile</h3>
                   <ul>
                     <li>
                       Entrée : Amuse-bouche créatif en fonction des produits de saison
                     </li>
                     <li>
                       Plat principal : Choix entre un plat de viande (bœuf, agneau) ou de poisson (homard, dorade) préparé en direct par le chef
                     </li>
                     <li>
                       Dessert : Dessert surprise préparé en table devant les invités
                     </li>
                     <li>
                       Boisson : Sélection de vins ou cocktails maison
                     </li>
                   </ul>
                 </div>
                 <div class="col-lg-4 text-center order-1 order-lg-2">
                   <img src="assets/img/specials-5.png" alt="" class="img-fluid">
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

     </div>
   </section><!-- End Specials Section -->

   <!-- ======= Book A Table Section ======= -->
   <section id="book-a-table" class="book-a-table">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Reservation</h2>
         <p>Book a Table</p>
       </div>

       <form action="" method="POST" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
         <div class="row">
           <div class="col-lg-4 col-md-6 form-group">
             <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
             <div class="validate"></div>
           </div>
           <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
             <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
             <div class="validate"></div>
           </div>
           <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
             <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
             <div class="validate"></div>
           </div>
           <div class="col-lg-4 col-md-6 form-group mt-3">
             <input type="date" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
             <div class="validate"></div>
           </div>
           <div class="col-lg-4 col-md-6 form-group mt-3">
             <input type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
             <div class="validate"></div>
           </div>
           <div class="col-lg-4 col-md-6 form-group mt-3">
             <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
             <div class="validate"></div>
           </div>
         </div>
         <div class="form-group mt-3">
           <input type="text" class="form-control" name="message" rows="5" placeholder="Message">
           <div class="validate"></div>
         </div>
         <!-- <div class="mb-3">
           <div class="loading">Loading</div>
           <div class="error-message"></div>
           <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
         </div> -->
         <div class="text-center"><button name="reservation" type="submit">Book a Table</button></div>
       </form>

     </div>
   </section><!-- End Book A Table Section -->

   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials" class="testimonials section-bg">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Témoignages</h2>
         <p>Ce qu'ils disent de nous</p>
       </div>

       <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
         <div class="swiper-wrapper">

           <div class="swiper-slide">
             <div class="testimonial-item">
               <p>
                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
               </p>
               <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
               <h3>Saul Goodman</h3>
               <h4>PDG &amp; Founder</h4>
             </div>
           </div><!-- End testimonial item -->

           <div class="swiper-slide">
             <div class="testimonial-item">
               <p>
                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
               </p>
               <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
               <h3>Sara Wilsson</h3>
               <h4>Designer</h4>
             </div>
           </div><!-- End testimonial item -->

           <div class="swiper-slide">
             <div class="testimonial-item">
               <p>
                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
               </p>
               <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
               <h3>Jena Karlis</h3>
               <h4>Propriétaire de magasin</h4>
             </div>
           </div><!-- End testimonial item -->

           <div class="swiper-slide">
             <div class="testimonial-item">
               <p>
                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
               </p>
               <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
               <h3>Matt Brandon</h3>
               <h4>Freelancer</h4>
             </div>
           </div><!-- End testimonial item -->

           <div class="swiper-slide">
             <div class="testimonial-item">
               <p>
                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Proin iaculis purus consequat sem cure dignissim donec porttitor entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
               </p>
               <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
               <h3>John Larson</h3>
               <h4>Entrepreneur</h4>
             </div>
           </div><!-- End testimonial item -->

         </div>
         <div class="swiper-pagination"></div>
       </div>

     </div>
   </section><!-- End Testimonials Section -->



   <!-- ======= Chefs Section ======= -->
   <section id="chefs" class="chefs">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Chefs</h2>
         <p>Nos chefs professionnels</p>
       </div>

       <div class="row">

         <div class="col-lg-4 col-md-6">
           <div class="member" data-aos="zoom-in" data-aos-delay="100">
             <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
             <div class="member-info">
               <div class="member-info-content">
                 <h4>Walter White</h4>
                 <span>Master Chef</span>
               </div>
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-4 col-md-6">
           <div class="member" data-aos="zoom-in" data-aos-delay="200">
             <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
             <div class="member-info">
               <div class="member-info-content">
                 <h4>Sarah Jhonson</h4>
                 <span>Patissier</span>
               </div>
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-4 col-md-6">
           <div class="member" data-aos="zoom-in" data-aos-delay="300">
             <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
             <div class="member-info">
               <div class="member-info-content">
                 <h4>William Anderson</h4>
                 <span>Cook</span>
               </div>
               <div class="social">
                 <a href=""><i class="bi bi-twitter"></i></a>
                 <a href=""><i class="bi bi-facebook"></i></a>
                 <a href=""><i class="bi bi-instagram"></i></a>
                 <a href=""><i class="bi bi-linkedin"></i></a>
               </div>
             </div>
           </div>
         </div>

       </div>

     </div>
   </section><!-- End Chefs Section -->

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
     <div class="container" data-aos="fade-up">

       <div class="section-title">
         <h2>Contact</h2>
         <p>Contactez-nous</p>
       </div>
     </div>

     <div class="container" data-aos="fade-up">

       <div class="row mt-5">

         <div class="col-lg-4">
           <div class="info">
             <div class="address">
               <i class="bi bi-geo-alt"></i>
               <h4>Location:</h4>
               <p>Safi.Route de agadir Ocp</p>
             </div>

             <div class="open-hours">
               <i class="bi bi-clock"></i>
               <h4>Open Hours:</h4>
               <p>
                 Monday-Saturday:<br>
                 11:00 AM - 2300 PM
               </p>
             </div>

             <div class="email">
               <i class="bi bi-envelope"></i>
               <h4>Email:</h4>
               <p>hamzalhadouchi@gmail.com</p>
             </div>

             <div class="phone">
               <i class="bi bi-phone"></i>
               <h4>Call:</h4>
               <p>+212 0684553285</p>
             </div>

           </div>

         </div>

         <div class="col-lg-8 mt-5 mt-lg-0">
          <?php 
          $result = $connect->query("SELECT * FROM `reservation`");
          $reservations = ($result && $result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
          if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $now = $_SESSION['user'];
            $id_user = htmlspecialchars($now['id']);
        }
        foreach ($reservation as $reserv) {
          ?><div class="w-screen "><?php
          if ($reserv['Répondre'] == 0 && $reserv['id_utilisateur'] == $id_user) {
            ?>
            <div class="w-full h-10 bg-yellow-400 rounded-xl flex justify-evenly items-center mb-2">
                <div>Réservation de : <?= $reserv['date_reservation'] ?></div>
                <form action="" method="POST">
                    <input type="hidden" value="<?= $reserv['id_reservation'] ?>">
                    <button type="submit" class="h-6 w-16 bg-red-900 rounded-lg">Annuler</button>
                </form>
            </div>
            <?php
            }
            
          ?>
           <form action="forms/contact.php" method="post" role="form" class="php-email-form">
             <div class="row">
               <div class="col-md-6 form-group">
                 <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
               </div>
               <div class="col-md-6 form-group mt-3 mt-md-0">
                 <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
               </div>
             </div>
             <div class="form-group mt-3">
               <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
             </div>
             <div class="form-group mt-3">
               <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
             </div>
             <div class="my-3">
               <div class="loading">Loading</div>
               <div class="error-message"></div>
               <div class="sent-message">Ton message a été envoyé. Merci!</div>
             </div>
             <div class="text-center"><button type="submit">Send Message</button></div>
           </form>

         </div>

       </div>

     </div>
   </section><!-- End Contact Section -->

 </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">
   <div class="footer-top">
     <div class="container">
       <div class="row">

         <div class="col-lg-3 col-md-6">
           <div class="footer-info">
             <h3>RevChaf</h3>
             <p>
               Safi.Route de agadir <br>
               Ocp Youcode<br><br>
               <strong>Phone:</strong> +212 0684553285<br>
               <strong>Email:</strong>hamza@gmail.com<br>
             </p>
             <div class="social-links mt-3">
               <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
               <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
               <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
               <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
               <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
             </div>
           </div>
         </div>

         <div class="col-lg-2 col-md-6 footer-links">
           <h4>Useful Links</h4>
           <ul>
             <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
             <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
             <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
             <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
             <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
           </ul>
         </div>

         <div class="col-lg-4 col-md-6 footer-newsletter">
           <h4>Notre Newsletter</h4>
           <p>Recevez nos dernières actualités, offres spéciales et événements directement dans votre boîte mail. Restez informé des nouveautés et ne manquez aucune occasion de découvrir nos créations exclusives.</p>

         </div>

       </div>
     </div>
   </div>

   <div class="container">
     
     <div class="credits">
       <!-- All the links in the footer should remain intact. -->
       <!-- You can delete the links only if you purchased the pro version. -->
       <!-- Licensing information: https://bootstrapmade.com/license/ -->
       <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
       Designed by <p>Hamza Lhadouchi</p>
     </div>
   </div>
 </footer><!-- End Footer -->

 <div id="preloader"></div>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="assets/vendor/aos/aos.js"></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
 <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 <script src="assets/vendor/php-email-form/validate.js"></script>
 <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>

</body>

</html>



