<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<!-- header -->


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Le blog de Ludovic Manga</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
  <link href="css/custom_style.css" rel="stylesheet">


  <script src='vendor/tinymce/tinymce/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#blogTextArea'
    });
  </script>
  
</head>


<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->

  <?php 

   $backgroundImage = '../public/img/post_writing.jpg'; 
   $headerTitle = 'Ecrire un article'; 
   $headerSubtitle = 'Postez votre plus belle création'; 
   require('include/pageheader.php'); 

  ?>

  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

      <?php 

         if(isset($_POST['title'])){

          echo '<b>votre article a bien été créé</b>'; 
         
        } else {

        ?>

        <div class="post_form_container">
          <h1 class="post_form_title">Rédiger un article</h1>
          <form action="index.php?action=postCreation" method = "POST" class="post_form">
          <input type="hidden" name="userId" value=" <?= $_SESSION['userId'] ?> ">
          <label>Titre article</label> <input class="post_form_input_post_title" name="title" type="text" required><br>
          <label>Sous-titre article</label> <input class="post_form_input_post_subtitle" name="subtitle" type="text" required><br>
          <label>Sujet article</label> <select class="post_form_input_post_topic" name="topicId" type="mail" required>

            <?php

            while($topicsFetch = $topics->fetch()){

              echo '<option name="topicId" value='.$topicsFetch['id'].'>'.$topicsFetch['topic_content'].'</option>'; 
            }

             ?>
             
          </select><br>
         
                <textarea id="blogTextArea" name="content"></textarea><br>
           
          <div class="container_form_button"><button type="submit" name="submit">Envoyer</button>
          </form></div>
        </div>

        <?php 
      }

      ?>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>
 

   <!-- bootstrap footer -->
   
   <?php require("include/boostrapFooter.php") ?>

</body>

</html>
