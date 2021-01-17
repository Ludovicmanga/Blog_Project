<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../public/img/newspaper.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Mes articles</h1>
            <span class="subheading">Le meilleur de mon actu</span>
          </div>
        </div>
      </div>
    </div>
  </header>


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
