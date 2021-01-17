<?php

use Openclassrooms\blog\PostManager; 
use Openclassrooms\blog\Post; 
use Openclassrooms\blog\MessageManager; 
use Openclassrooms\blog\Message; 

require('model/Postmanager.php'); 
require('model/Post.php'); 
require('model/message.php'); 
require('model/messagemanager.php');

class frontend 
{
	public function listPosts()
	{
		$postManager = new PostManager; 
		$posts = $postManager->getAllPosts(); 

		require ('../public/view/frontend/listPosts.php'); 
	}

	public function post()
	{
		$postManager = new PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../public/view/frontend/post.php'); 
	}

	public function homePage()
	{
		require('../public/view/frontend/homePage.php'); 
	}

	public function connexionPage()
	{
		require('../public/view/frontend/connexionPage.php'); 
	}

	public function messagesent()
	{
		$messageManager = new MessageManager; 
		$message = new Message; 
		require('../public/view/frontend/messagesentview.php'); 
	}

	public function postCreation()
	{
		require('../public/view/frontend/postCreation.php');
		
		if(isset($_POST['title'])){

         $postManager = new PostManager; 
		 $post = new Post; 
		 $post->setTitle($_POST['title']); 
         $post->setTopic($_POST['topic']); 
         $post->setSubtitle($_POST['subtitle']); 
         $post->setContent($_POST['content']); 
         $postManager->addPost($post);
        } 
		  
	}

	public function postCreated()
	{
		 $postManager = new PostManager; 
		 $post = new Post; 
		 $post->setTitle($_POST['title']); 
         $post->setTopic($_POST['topic']); 
         $post->setSubtitle($_POST['subtitle']); 
         $post->setContent($_POST['content']); 
         $postManager->addPost($post);
         // recuperer le last_insert_id LAST_INSERT_ID depuis MYSQL

         // redirect vers la list postdisplay
         
		require('../public/view/frontend/postCreated.php'); 
	}


	public function displayPostUpdate()
	{
		$postManager = new \Openclassrooms\blog\Postmanager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../public/view/frontend/displayPostUpdate.php'); 
	}

	public function postUpdate()
	{
		$postManager = new Postmanager; 
		$post = new Post;  

		require('../public/view/frontend/postUpdate.php'); 
	}

	public function adminPage()
	{
		require('../public/view/frontend/adminPage.php'); 
	}

}


