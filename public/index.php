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

require('../Controller/frontend.php'); 
require('../Controller/users.php'); 


function chargerClass($class)
{
	$className = '../'.str_replace('\\', '/', $class).'.php'; 
	require($className); 
}

spl_autoload_register('chargerClass'); 


$frontend = new Frontend; 
$users = new Users; 

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
