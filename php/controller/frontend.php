<?php

require('model/Postmanager.php'); 

class frontend 
{
	public function listPosts()
	{
		$postManager = new PostManager; 
		$posts = $postManager->getAllPosts(); 

		require ('../public/view/frontend/listpostview.php'); 
	}

	public function post()
	{
		$postManager = new PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../public/view/frontend/postview.php'); 
	}

	public function homePage()
	{
		require('../public/view/frontend/homepageview.php'); 
	}

	public function connexionPage()
	{
		require('../public/view/frontend/connexionpageview.php'); 
	}
}


