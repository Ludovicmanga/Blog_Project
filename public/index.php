<?php 

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
	Message 
}; 

use Controller\
{
	frontend, 
	users, 
	posts
}
; 

/**
* Automatisation of the 'require' of classes thanks to spl_autoload_register
*/

// we create the 'chargerClass'
function chargerClass($class)
{
	$className = '../'.str_replace('\\', '/', $class).'.php'; 
	require $className; 
}

//We pass it in spl_autoload_register
spl_autoload_register('chargerClass'); 

// We create the controller objects
$frontend = new Frontend; 
$users = new Users; 
$posts = new Posts; 

/**
* According to what is written in 'action', display a specific page ; If nothing is in action, display the home page.
If an error occured, display it
*/

try {
	if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING)) {
		if (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'listPosts') {
			$posts->listPosts(); 
		} elseif (filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'post') {
			if(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT) && filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT) > 0) {
				$posts->post(); 
			} else {
				throw new Exception('Aucun identifiant');	
			}
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'home') {
			$frontend->home(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'login') {
			$users->login(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'logout') {
			$users->logout(); 
		} 
		elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'register') {
			$users->register(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'postCreation') {
			$posts->postCreation(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'commentsToValidate') {
			$posts->commentsToValidate(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'admin') {
			$users->admin(); 
		}  elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'listUserPosts') {
			$posts->listUserPosts(); 
		} elseif(filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING) === 'postUpdate') {
			if(filter_input(INPUT_GET, "postId", FILTER_SANITIZE_NUMBER_INT) OR filter_input(INPUT_POST, "postId", FILTER_SANITIZE_NUMBER_INT)) {
				$posts->postUpdate();
			} else {
				throw new Exception('pas d\'identifiant de post'); 
			}
		}
	} else {
		$frontend->home(); 
	}	
} 
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage(); 
}
