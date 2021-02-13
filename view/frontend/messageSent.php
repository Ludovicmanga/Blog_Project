<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require 'require/pageHeadTemplate.php' ;  ?>

<body>

  <!-- Navigation -->

  <?php require 'require/navbar.php' ; ?>


  <!-- Main Content -->
  
  <div class="container">


  <!-- Main Content -->
  <div class="container">

      <!-- Début bootstrap-->

      <div class="post-preview">
          <a href="index.php?action=listposts">
            <h2 class="post-title">
              Mon actualité
            </h2>
            <h3 class="post-subtitle">
              Voir mes articles
            </h3>
          </a>
          <p class="post-meta">Articles à la une
            </p>
        </div>
        <hr>

        <div class="post-preview">
          <a href="https://www.linkedin.com/in/ludovic-manga-jocky/">
            <h2 class="post-title">
              Mes références
            </h2>
            <h3 class="post-subtitle">
              Voir mes références
            </h3>
          </a>
          <p class="post-meta">Des références sérieuses
            </p>
        </div>
        <hr>

        <?php

        $message->setName($_POST['name']); 
        $message->setLastname($_POST['lastname']); 
        $message->setMail($_POST['mail']); 
        $message->setMessagecontent($_POST['content']); 

        $messageManager->addMessage($message); 


         ?>
          <p>Merci, votre message a été reçu, nous reviondrons rapidement vers vous!</p>
      
  
        
        <!-- Pager -->
    
    <?php require 'require/footer.php' ; ?>

  </div>

  <hr>

  <!-- Footer -->

    <?php require 'require/footer.php' ?>

  
  <!-- bootstrap footer -->
  
  <?php require 'require/boostrapFooter.php' ; ?>

</body>

</html>
