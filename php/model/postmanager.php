<?php
require ('manager.php'); 
class PostManager extends Manager
{
	public function getAllPosts()
	{
		$db = $this->dbConnect(); 
		$req = $db->query('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.user_id = user.id ORDER BY creation_date DESC LIMIT 0,5'); 
		return $req; 
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect(); 
		$req = $db->prepare('SELECT post.*, user.name as author FROM post INNER JOIN user WHERE user.id = post.user_id AND post.id = ?'); 
		$req->execute(array ($postId)); 
		$post = $req->fetch(); 

		return $post; 
	}
}

