<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../public/img/admin.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Espace admin</h1>
            <span class="subheading">Gestion de votre compte</span>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Main Content -->
  <div class="container">

    <h1>Articles</h1>
    <ul>
      <li><a href="">Créer un article</a></li>
      <li><a href="">Modifier ou supprimer un article</a></li>
    </ul>

    <h1>Utilisateurs</h1>
    <ul>
      <li><a href="">Créer un utilisateur</a></li>
      <li><a href="">Modifier ou supprimer un utilisateur</a></li>
    </ul>

        <hr>


      <!-- Contact form -->



    <!-- Pager -->
    
    <?php require("include/pager.php") ?>
        
  </div>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>


  <!-- bootstrap footer -->
  
  <?php require("include/boostrapFooter.php") ?>

</body>

</html>
