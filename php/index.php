<?php 

require('controller/frontend.php'); 
$frontend = new frontend; 

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] === 'listposts') {
			$frontend->listPosts(); 
		} elseif ($_GET['action'] === 'post') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				$frontend->post(); 
			} else {
				throw new Exception('Aucun identifiant');	
			}
		} elseif($_GET['action'] === 'homepage') {
			$frontend->homePage(); 
		} elseif($_GET['action'] === 'connexionpage') {
			$frontend->connexionPage(); 
		} elseif($_GET['action'] === 'messagesent') {
			$frontend->messagesent(); 
		} 
		elseif($_GET['action'] === 'postcreation') {
			$frontend->postCreation(); 
		} 
		elseif($_GET['action'] === 'postmodification') {
			if(isset($_GET['id'])){
				$frontend->postModification();
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
