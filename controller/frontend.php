<?php

namespace Controller;

use Model\
{
	Manager,
	UserManager,
	User, 
	PostManager,
	Post,
	TopicManager,
	Topic, 
	MessageManager, 
	Message,
	Comment,
	CommentManager
}; 

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
		
		$postToIncrementViews = new Post; 

		$postToIncrementViews->setViews($post['views']);
		$postToIncrementViews->setId($_GET['id']);

		$postToIncrementViews->incrementPostViews(); 

		$postManager->addIncrementedPostViews($postToIncrementViews); 

		$commentManager = new CommentManager; 

		$postComments = $commentManager->getAllPostComments($_GET['id']); 

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$comment = new Comment; 

			$comment
				->setCommentAuthor($_POST_CLEAN['commentAuthor'])
				->setValidation('toValidate')
				->setCommentContent($_POST_CLEAN['commentContent'])
				->setPostId($_POST_CLEAN['postId'])
			; 

			$commentManager->sendToValidation($comment); 
		}

		require('../view/frontend/post.php'); 
	}


	public function home()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		 	$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$messageManager = new MessageManager; 
			$message = new Message;  

			$message
				->setName($_POST_CLEAN['name'])
				->setLastName($_POST_CLEAN['lastName'])
				->setMail($_POST_CLEAN['mail'])
				->setMessageContent($_POST_CLEAN['messageContent'])
			; 

			$messageManager->addMessage($message); 
		} 

		require('../view/frontend/home.php'); 		
	}

	/**
	 * Adding of a post
	 */
	public function postCreation()
	{
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
			 $_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			 
	         $postManager = new PostManager; 
	       	 $newPost = new Post; 
	       	 $newPost
	       	 	->setTitle($_POST_CLEAN['title']) 
	       	 	->setTopicId($_POST_CLEAN['topicId'])
	         	->setSubtitle($_POST_CLEAN['subtitle'])
	         	->setuserId($_POST_CLEAN['userId'])
	         	->setContent($_POST['content'])
	         ;
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
		
				$post = $postManager->getPost($_GET['postId']); 
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


	public function commentsToValidate()
	{
		session_start(); 
		$commentManager = new CommentManager; 

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$comment = new Comment; 
			$comment->setId($_POST_CLEAN['commentId']); 

			if(isset($_POST_CLEAN['validateComment'])){

				$commentManager->validateComment($comment->getId()); 

			} 

			if(isset($_POST_CLEAN['denyComment'])){

				$commentManager->denyComment($comment->getId()); 

			}
		}

		$commentsToValidate = $commentManager->getAllCommentsToValidate($_SESSION['userId']); 

		require('../view/frontend/commentsToValidate.php'); 
	}	
}
