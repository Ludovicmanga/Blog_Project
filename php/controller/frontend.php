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

	public function messagesent()
	{
		require('../public/view/frontend/messagesentview.php'); 
	}

	public function postCreation()
	{
		require('../public/view/frontend/postcreationview.php'); 
	}

	public function postModification()
	{
		$postManager = new Postmanager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../public/view/frontend/postmodificationview.php'); 
	}

}


