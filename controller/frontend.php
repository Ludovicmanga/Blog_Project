<?php


function chargerClassFrontend($class)
{
	require('../../'.$class.'.php'); 
}

spl_autoload_register('chargerClassFrontend'); 


class Frontend 
{
	public function listPosts()
	{
		$postManager = new ProjetBlog\Model\PostManager; 
		$posts = $postManager->getAllPosts(); 

		require ('../view/frontend/listPosts.php'); 
	}

	public function post()
	{
		$postManager = new ProjetBlog\Model\PostManager; 
		$post = $postManager->getPost($_GET['id']); 

		require('../view/frontend/post.php'); 
	}

	public function home()
	{
			if($_SERVER['REQUEST_METHOD'] == 'POST') {

		 	$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$messageManager = new ProjetBlog\Model\MessageManager; 
			$message = new ProjetBlog\Model\Message;  
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

		$topicManager = new ProjetBlog\Model\TopicManager; 
       	$allTopics = $topicManager->getAllTopics(); 
		

         if($_SERVER['REQUEST_METHOD'] == 'POST') {

		 $_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

         $postManager = new ProjetBlog\Model\PostManager; 
       	 $newPost = new ProjetBlog\Model\Post; 
       	 $newPost->setTitle($_POST_CLEAN['title']); 
         $newPost->setTopicId($_POST_CLEAN['topicId']); 
         $newPost->setSubtitle($_POST_CLEAN['subtitle']); 
         $newPost->setuserId($_GET['userId']); 
         $newPost->setContent($_POST_CLEAN['content']); 
         $postManager->addPost($newPost);
       	 require('../view/frontend/postCreation.php');
         } else {
        	 require('../view/frontend/postCreation.php');
         }
	}

	public function postUpdate()
	{
		$postManager = new ProjetBlog\Model\PostManager; 
		$getPost = $postManager->getPost($_GET['id']); 

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$post = new ProjetBlog\Model\Post; 
			$post->setTitle($_POST_CLEAN['title']); 
	        $post->setTopicId($_POST_CLEAN['topicId']); 
	        $post->setSubtitle($_POST_CLEAN['subtitle']); 
	        $post->setContent($_POST_CLEAN['content']);
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


