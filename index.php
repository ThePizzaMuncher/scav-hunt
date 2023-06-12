<?php
session_start();
$_SESSION["pagina"] = "home";
include 'assets/includes/header.php';
echo <<< meta
<html id="page_home">
meta;
?>

<main id="main">

<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
     <section id="about" class="section-50 d-flex flex-column align-items-center">
       <div class="container">
         <div class="row">
           <div class="col-5">
             <div class="block">
                <div class="content d-flex flex-column justify-content-center align-items-center sticked-header-offset">
                <h3>We are nice guys!!</h3>
                <button>Here is the button</button>
            </div>
             </div>
           </div>
           <div class="col-7">
             <div class="row">
               <div class="col-4">
                 <div class="block">
                   <h2>Block 1</h2>
                   <p>Block content 1</p>
                 </div>
               </div>
               <div class="col-4">
                 <div class="block">
                   <h2>Block 2</h2>
                   <p>Block content 2</p>
                 </div>
               </div>
               <div class="col-4">
                 <div class="block">
                   <h2>Block 3</h2>
                   <p>Block content 3</p>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-12">
                 <div class="full-width-block">
                   <h2>Fullwidth block</h2>
                   <p>Fullwidth block content</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       <div class="container">
       </div>
     </section>
   </section> <!-- End About Section -->

<?php include "assets/includes/footer.php"?>