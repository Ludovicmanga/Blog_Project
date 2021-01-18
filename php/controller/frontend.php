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
		

         if(isset($_POST['title'])){
         $postManager = new PostManager; 
       	 $post = new Post; 
       	 require('../public/view/frontend/postCreation.php');
         $post->setTitle($_POST['title']); 
         $post->setTopicId($_POST['topicId']); 
         $post->setSubtitle($_POST['subtitle']); 
         $post->setuserId($_POST['userId']); 
         $post->setContent($_POST['content']); 
         $postManager->addPost($post);} else {

         require('../public/view/frontend/postCreation.php');

         }

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


