<?php

require('model/Postmanager.php'); 
require('model/Post.php'); 
require('model/message.php'); 
require('model/messagemanager.php');

class frontend 
{
	public function listPosts()
	{
		$postManager = new \Openclassrooms\blog\PostManager; 
		$posts = $postManager->getAllPosts(); 

		require ('../public/view/frontend/listpostview.php'); 
	}

	public function post()
	{
		$postManager = new \Openclassrooms\blog\PostManager; 
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
		$messageManager = new \Openclassrooms\blog\MessageManager; 
		$message = new \Openclassrooms\blog\Message; 
		require('../public/view/frontend/messagesentview.php'); 
	}

	public function postCreation()
	{
		require('../public/view/frontend/postcreationview.php'); 
	}

	public function postCreated()
	{
		$postManager = new \Openclassrooms\blog\PostManager; 
		$post = new \Openclassrooms\blog\Post; 
		require('../public/view/frontend/postcreatedview.php'); 
	}


	public function displayPostUpdate()
	{
		$postManager = new \Openclassrooms\blog\Postmanager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../public/view/frontend/displaypostupdateview.php'); 
	}

	public function postUpdate()
	{
		$postManager = new \Openclassrooms\blog\Postmanager; 
		$post = new \Openclassrooms\blog\Post;  

		require('../public/view/frontend/postupdateview.php'); 
	}

}


