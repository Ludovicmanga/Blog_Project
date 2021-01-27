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
		if(isset($_POST['mail'])){
			$messageManager = new ProjetBlog\Model\MessageManager; 
			$message = new ProjetBlog\Model\Message;  
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

		$topicManager = new ProjetBlog\Model\TopicManager; 
       	$allTopics = $topicManager->getAllTopics(); 
		

         if(isset($_POST['submit'])){
         $postManager = new ProjetBlog\Model\PostManager; 
       	 $newPost = new ProjetBlog\Model\Post; 
       	 $newPost->setTitle($_POST['title']); 
         $newPost->setTopicId($_POST['topicId']); 
         $newPost->setSubtitle($_POST['subtitle']); 
         $newPost->setuserId($_GET['userId']); 
         $newPost->setContent($_POST['content']); 
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

		if(isset($_POST['submit'])){
			$post = new ProjetBlog\Model\Post; 
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


