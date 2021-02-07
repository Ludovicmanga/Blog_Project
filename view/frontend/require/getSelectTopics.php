 <?php
 while($topicsFetch = $topics->fetch()){
	echo '<option name="topicId" value='.$topicsFetch['id'].'>'
	.$topicsFetch['topic_content']
	.'</option>'
	; 
}
