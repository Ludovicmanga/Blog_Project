<?php 

require('../controller/frontend.php'); 
require('../controller/users.php'); 

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
		} 
		elseif($_GET['action'] === 'register') {
			$users->register(); 
		} elseif($_GET['action'] === 'postCreation') {
			$frontend->postCreation(); 
		} elseif($_GET['action'] === 'admin') {
			$frontend->admin(); 
		} elseif($_GET['action'] === 'postUpdate') {
			if(isset($_GET['id'])) {
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
