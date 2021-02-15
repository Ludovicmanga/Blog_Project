<?php

// We display the comments needing validation
while($commentToValidate = $commentsToValidate->fetch()){
	?>
		<p>
			 <?= $commentToValidate['commentAuthor']; ?><br>
			 <?= $commentToValidate['creationDate']; ?><br>
			 <?= $commentToValidate['commentContent'] ; ?><br>
		</p> 

		<form action="index.php?action=commentsToValidate" method="POST">
    		<input type="hidden" name="commentId" value=" <?= $commentToValidate['commentId']; ?> ">
    		<button type="submit" name="validateComment">Valider le commentaire</button><br>
   			<button type="submit" name="denyComment">Refuser le commentaire</button><br><br>
    	</form>
    	
	<?php
}

?>
		

