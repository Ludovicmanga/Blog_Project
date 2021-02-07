<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php require("require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->
  <?php require("require/navbar.php") ?>
    
    <!-- Page Header -->
  <?php 

   // styling of the header, thanks to require/pageheader
   $backgroundImage = '../public/img/newspaper.jpg'; 
   $headerTitle = 'Mes articles'; 
   $headerSubtitle = 'Modifier mes articles'; 
   require('require/pageheader.php'); 

  ?>

  <!-- Main Content -->
  <div class="container">
  <?php

  //we get the posts from the id from who th session is open
  require('../view/frontend/require/listUserPosts.php');
  ?>
  </div>

  <hr>

  <!-- Footer -->
    <?php require("require/footer.php") ?>

  <!-- bootstrap footer -->
  <?php require("require/boostrapFooter.php") ?>

</body>

</html>


