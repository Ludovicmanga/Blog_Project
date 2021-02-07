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
	users
}
; 

/**
* Automatisation of the 'require' of classes thanks to spl_autoload_register
*/

// we create the 'chargerClass'
function chargerClass($class)
{
	$className = '../'.str_replace('\\', '/', $class).'.php'; 
	require($className); 
}

//We pass it in spl_autoload_register
spl_autoload_register('chargerClass'); 

// We create the controller objects
$frontend = new Frontend; 
$users = new Users; 

/**
* According to what is written in 'action', display a specific page ; If nothing is in action, display the home page.
If an error occured, display it
*/

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] === 'listPosts') {
			$frontend->listPosts(); 
		} elseif ($_GET['action'] === 'post') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				$frontend->post(); 
			} else {
				throw new Exception('Aucun identifiant');	
			}
		} elseif($_GET['action'] === 'home') {
			$frontend->home(); 
		} elseif($_GET['action'] === 'login') {
			$users->login(); 
		} elseif($_GET['action'] === 'logout') {
			$users->logout(); 
		} 
		elseif($_GET['action'] === 'register') {
			$users->register(); 
		} elseif($_GET['action'] === 'postCreation') {
			$frontend->postCreation(); 
		} elseif($_GET['action'] === 'commentsToValidate') {
			$frontend->commentsToValidate(); 
		} elseif($_GET['action'] === 'admin') {
			$frontend->admin(); 
		}  elseif($_GET['action'] === 'listUserPosts') {
			$frontend->listUserPosts(); 
		} elseif($_GET['action'] === 'postUpdate') {
			if(isset($_GET['postId']) OR $_POST['postId']) {
				$frontend->postUpdate();
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
