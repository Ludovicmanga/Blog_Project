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
   $headerSubtitle = 'Modifier mes articles'; 
   require('include/pageheader.php'); 

  ?>


  <!-- Main Content -->
  
  <div class="container">

      <?php


        while($userPostsFetch = $userPosts->fetch())
        {
          ?>
          <div class="post-preview">
              <a href= <?= 'index.php?action=postUpdate&postId='.$userPostsFetch['post_id']?>>
                <h2 class="post-title">
                  <?= $userPostsFetch['title'] ?>
                </h2>
                <h3 class="post-subtitle">
                  <?= $userPostsFetch['subtitle'] ?>
                </h3>
              </a>
              <p class="post-meta">Posted by
                <?= $userPostsFetch['author'] ?></p>
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


