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

	} else {
		$frontend->homePage(); 
	}	
} 
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage(); 
}
