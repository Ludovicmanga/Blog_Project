<?php 

require('controller/frontend.php'); 
$frontend = new frontend; 

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
		} elseif($_GET['action'] === 'homePage') {
			$frontend->homePage(); 
		} elseif($_GET['action'] === 'connexionPage') {
			$frontend->connexionPage(); 
		} elseif($_GET['action'] === 'messageSent') {
			$frontend->messagesent(); 
		} 
		elseif($_GET['action'] === 'postCreation') {
			$frontend->postCreation(); 
		} elseif($_GET['action'] === 'adminPage') {
			$frontend->adminPage(); 
		} elseif($_GET['action'] === 'displayPostUpdate') {
			if(isset($_GET['id'])) {
				$frontend->displayPostUpdate();
			} else {
				throw new Exception('pas d\'identifiant de post'); 
			}
		}
	} else {
		$frontend->homePage(); 
	}	
} 
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage(); 
}
