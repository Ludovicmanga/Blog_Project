<?php

// We display the comments needing validation
while($commentToValidate = $commentsToValidate->fetch()){
	?>
		<p>
			 <?= $commentToValidate['commentAuthor']; ?><br>
			 <?= $commentToValidate['creationDate']; ?><br>
			 <?= $commentToValidate['commentContent'] ; ?><br>
		</p> 
	<?php
}

?>
		

