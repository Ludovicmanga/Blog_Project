<?php

while($post = $posts->fetch())
{
  ?>
  <div class="post-preview">
      <a href= <?= 'index.php?action=post&id='.$post['post_id']?>>
        <h2 class="post-title">
          <?= $post['title'] ?>
        </h2>
        <h3 class="post-subtitle">
          <?= $post['subtitle'] ?>
        </h3>
      </a>
      <p class="post-meta">Posté par
        <?= $post['author'] ?></p>
    </div>
    <hr>
<?php
}
		
?> 