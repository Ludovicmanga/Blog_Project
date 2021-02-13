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
	/**
	 * Displaying of home page
	 */
	public function home()
	{
		// We verify whether the contact form was filled and clean $_POST
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		 	$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

		 	//if so, we send the added message to the DB
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

		// We display the view
		require '../view/frontend/home.php'; 		
	}

}
