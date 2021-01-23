<?php

use Blog\PostManager; 
use Blog\Post; 
use Blog\MessageManager; 
use Blog\Message; 

require('../model/Postmanager.php'); 
require('../model/Post.php'); 
require('../model/message.php'); 
require('../model/messagemanager.php');

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
		if(isset($_POST['mail'])){
			$messageManager = new MessageManager; 
			$message = new Message;  
			$message->setName($_POST['name']); 
			$message->setLastName($_POST['lastName']); 
			$message->setMail($_POST['mail']); 
			$message->setMessageContent($_POST['messageContent']); 
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
		

         if(isset($_POST['submit'])){
         $postManager = new PostManager; 
       	 $post = new Post; 
       	 $post->setTitle($_POST['title']); 
         $post->setTopicId($_POST['topicId']); 
         $post->setSubtitle($_POST['subtitle']); 
         $post->setuserId($_POST['userId']); 
         $post->setContent($_POST['content']); 
         $postManager->addPost($post);
       	 require('../view/frontend/postCreation.php');
         } else {
        	 require('../view/frontend/postCreation.php');
         }
	}

	public function postUpdate()
	{
		$postManager = new PostManager; 
		$getPost = $postManager->getPost($_GET['id']); 

		if(isset($_POST['submit'])){
			$post = new Post; 
			$post->setTitle($_POST['title']); 
	        $post->setTopicId($_POST['topicId']); 
	        $post->setSubtitle($_POST['subtitle']); 
	        $post->setContent($_POST['content']);
	        $post->id($_GET['id']); 
	        $postManager->updatePost($post); 
			require('../view/frontend/displayPostUpdate.php');  
		} else {
			require('../view/frontend/postUpdate.php'); 
		}	
	}


	public function admin()
	{
		require('../view/frontend/admin.php'); 
	}

}


