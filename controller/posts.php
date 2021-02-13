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

class Posts
{
	/**
	 * Displaying of the list of all posts
	 */
	public function listPosts()
	{
		//the object postManager gets all posts from the DB 
		$postManager = new PostManager; 
		$posts = $postManager->getAllPosts(); 

		// We display the view
		require '../view/frontend/listPosts.php'; 
	}

	/**
	 * Displaying of a particular post
	 */
	public function post()
	{
		// We get a particular post from the DB 
		$postManager = new PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		// System of adding of views every time the post is gotten from DB
		$postToIncrementViews = new Post; 
		$postToIncrementViews->setId($_GET['id']);
		$postToIncrementViews->setViews($post['views']);
		$postToIncrementViews->incrementPostViews(); 
		$postManager->addIncrementedPostViews($postToIncrementViews);

		// We get the post comments from the DB to display them
		$commentManager = new CommentManager; 
		$postComments = $commentManager->getAllPostComments($_GET['id']); 

		// We verify whether the comment form was filled and clean $_POST 
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			// if so, we send the added comment to validation from the post author
			$comment = new Comment; 
			$comment
				->setCommentAuthor($_POST_CLEAN['commentAuthor'])
				->setValidation('toValidate')
				->setCommentContent($_POST_CLEAN['commentContent'])
				->setPostId($_POST_CLEAN['postId'])
			; 
			$commentManager->sendToValidation($comment); 
		}

		// We display the view
		require '../view/frontend/post.php'; 
	}

	/**
	 * We display the post creation page
	 */
	public function postCreation()
	{
		// We verify whether the post form was filled and clean $_POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
			 $_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			 
			 // if so, we send the added post to the DB
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
	    } else {

	    	//we get the topics from the DB to display it in the post creation form 
			$topicManager = new TopicManager; 
	       	$topics = $topicManager->getAllTopics(); 
	    }

	    // We display the view
	    require '../view/frontend/postCreation.php';
	}

	/**
	* We display the post update page
	*/ 
	public function postUpdate()
	{
		$postManager = new PostManager; 

		// We verify whether the update form was filled and clean $_POST 
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			//if so, we send the updated post to the DB
			$post = new Post; 
			$post
				->setTitle($_POST_CLEAN['title'])
	        	->setTopicId($_POST_CLEAN['topicId'])
	        	->setSubtitle($_POST_CLEAN['subtitle'])
	        	->setContent($_POST_CLEAN['content'])
	        	->setId($_POST_CLEAN['postId'])
	        ;
	        $postManager->updatePost($post); 
		} else {
		
				$post = $postManager->getPost($_GET['postId']); 
				$topicManager = new TopicManager; 
       			$topics = $topicManager->getAllTopics(); 
		} 

		// We display the view
		require '../view/frontend/postUpdate.php';  
	}

	/**
	* We display the post created by a specific user 
	*/ 
	public function listUserPosts()
	{

		session_start(); 

		// we get the all the posts from a specific user
		$postManager = new PostManager; 
		$userPosts = $postManager->getAllUserPosts($_SESSION['userId']); 

		require '../view/frontend/listUserPosts.php'; 
	}

	/**
	* We display to a specific user the comments needed validation 
	*/ 
	public function commentsToValidate()
	{
		session_start(); 
		$commentManager = new CommentManager; 

		// We check whether the use validated or denied the comment and clean $_POST
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			// We target the adequat comment by Id 
			$comment = new Comment; 
			$comment->setId($_POST_CLEAN['commentId']); 

			// According to the validation or denial of the comment, we update the colum "isValidated" in DB
			if(isset($_POST_CLEAN['validateComment'])){
				$commentManager->validateComment($comment->getId()); 
			} 
			if(isset($_POST_CLEAN['denyComment'])){
				$commentManager->denyComment($comment->getId()); 
			}
		}

		// We get the list of all the comments needing validation by a specific user 
		$commentsToValidate = $commentManager->getAllCommentsToValidate($_SESSION['userId']); 

		// We display the view
		require '../view/frontend/commentsToValidate.php' ; 
	}	

}