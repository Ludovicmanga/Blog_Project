<?php

use Model\Manager; 
use Model\UserManager; 
use Model\User; 
use Model\PostManager; 
use Model\Post; 
use Model\TopicManager; 
use Model\Topic; 
use Model\MessageManager; 
use Model\Message;


class Frontend 
{
	public function listPosts()
	{
		$postManager = new PostManager; 
		$posts = $postManager->getAllPosts(); 

		require ('../view/frontend/listPosts.php'); 
	}

	public function post()
	{
		$postManager = new PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../view/frontend/post.php'); 
	}

	public function home()
	{
			if($_SERVER['REQUEST_METHOD'] == 'POST') {

		 	$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$messageManager = new MessageManager; 
			$message = new Message;  

			$message->setName($_POST_CLEAN['name']); 
			$message->setLastName($_POST_CLEAN['lastName']); 
			$message->setMail($_POST_CLEAN['mail']); 
			$message->setMessageContent($_POST_CLEAN['messageContent']); 

			$messageManager->addMessage($message);

			require('../view/frontend/home.php'); 
		} else {
			require('../view/frontend/home.php'); 
		}
	}

	public function messagesent()
	{
		
		require('../view/frontend/messagesentview.php'); 
	}

	public function postCreation()
	{
         if($_SERVER['REQUEST_METHOD'] == 'POST') {

		 $_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

         $postManager = new PostManager; 
       	 $newPost = new Post; 
       	 $newPost->setTitle($_POST_CLEAN['title']); 
         $newPost->setTopicId($_POST_CLEAN['topicId']); 
         $newPost->setSubtitle($_POST_CLEAN['subtitle']); 
         $newPost->setuserId($_POST_CLEAN['userId']); 
         $newPost->setContent($_POST_CLEAN['content']); 
         $postManager->addPost($newPost);

       	 require('../view/frontend/postCreation.php');
         } else {

		$topicManager = new TopicManager; 
       	$topics = $topicManager->getAllTopics(); 

        	 require('../view/frontend/postCreation.php');
         }
	}

	public function postUpdate()
	{

		$postManager = new PostManager; 

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$post = new Post; 

			$post
				->setTitle($_POST_CLEAN['title'])
	        	->setTopicId($_POST_CLEAN['topicId'])
	        	->setSubtitle($_POST_CLEAN['subtitle'])
	        	->setContent($_POST_CLEAN['content'])
	        	->setId($_POST_CLEAN['postId'])
	        ;
	        $postManager->updatePost($post); 
			require('../view/frontend/postUpdate.php');  
		} else {
		
				$getPost = $postManager->getPost($_GET['postId']); 
				$topicManager = new TopicManager; 
       			$topics = $topicManager->getAllTopics(); 

			require('../view/frontend/postUpdate.php'); 
		}	
	}


	public function admin()
	{
		require('../view/frontend/admin.php'); 
	}

	public function listUserPosts()
	{

		session_start(); 

		$postManager = new PostManager; 
		$userPosts = $postManager->getAllUserPosts($_SESSION['userId']); 

		require('../view/frontend/listUserPosts.php'); 
	}



}


