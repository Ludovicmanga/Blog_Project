<?php

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect(); 
		$req = $db->query('SELECT * FROM posts ORDER BY creation_date DESC'); 
		return $req; 
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect(); 
		$req = $db->query('SELECT * FROM posts WHERE id = ?'); 
		$req->execute(array $postId); 
		$post = $req->fetch(); 

		return $post; 
	}
}