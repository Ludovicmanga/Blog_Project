<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>
    
    <!-- Page Header -->
  
  <?php 

   $backgroundImage = '../public/img/newspaper.jpg'; 
   $headerTitle = 'Mes articles'; 
   $headerSubtitle = 'Plongez-vous dans mon actu'; 
   require('include/pageheader.php'); 

  ?>


  <!-- Main Content -->
  
  <div class="container">

      <?php

        while($data = $posts->fetch())
        {
          ?>
          <div class="post-preview">
              <a href= <?= 'index.php?action=post&id='.$data['post_id']?>>
                <h2 class="post-title">
                  <?= $data['title'] ?>
                </h2>
                <h3 class="post-subtitle">
                  <?= $data['subtitle'] ?>
                </h3>
              </a>
              <p class="post-meta">Posted by
                <?= $data['author'] ?></p>
            </div>
            <hr>
        <?php
    }

     ?> 
        

  </div>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>

  
  <!-- bootstrap footer -->
  
  <?php require("include/boostrapFooter.php") ?>

</body>

</html>
