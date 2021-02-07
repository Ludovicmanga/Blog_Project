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
      <p class="post-meta">Posté par
        <?= $data['author'] ?></p>
    </div>
    <hr>
<?php
}
		
?> 