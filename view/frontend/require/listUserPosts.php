<?php

//we get the posts from the id from who th session is open
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