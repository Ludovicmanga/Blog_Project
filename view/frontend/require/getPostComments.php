<?php

while($postComment = $postComments->fetch()){
  ?>
    <div>
      <?= $postComment['commentAuthor'] ?><br>
      <?= $postComment['creationDate'] ?><br>
      <?= $postComment['commentContent'] ?><br>
      <br>
    </div>
  <?php
}

?>