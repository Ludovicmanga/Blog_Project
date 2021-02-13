 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Ludovic Manga</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=listPosts">Mes articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.linkedin.com/in/ludovic-manga-jocky/">Mon CV</a>
          </li>

             <?php if(isset($_SESSION['userId'])){

              ?>

              <li class="nav-item">
                <a class="nav-link" href="index.php?action=logout">Se déconnecter</a>
              </li>

              <?php

             } else {

              ?>

                <li class="nav-item">
                <a class="nav-link" href="index.php?action=login">Connexion</a>
              </li>

              <?php

             }

             ?>

        </ul>
      </div>
    </div>
  </nav>

