<?php

require('model/Postmanager.php'); 

class frontend 
{
	public function listPosts()
	{
		$postManager = new PostManager; 
		$posts = $postManager->getAllPosts; 

		require ('view/frontend/listPostview.php'); 
	}

	public function post()
	{
		$postManager = new PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		require('view/frontend/postView.php'); 
	}
}


