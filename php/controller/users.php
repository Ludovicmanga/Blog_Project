<?php

use Openclassrooms\blog\UserManager;

require('model/UserManager.php');

class Users
{
	public function login()
	{
		$UserManager = new UserManager; 
		$data = [
			'mailError' => '',
			'passwordError' => '', 

		]; 

		require('../public/view/frontend/login.php'); 
	}

	public function register()
	{
		$UserManager = new UserManager; 
		$data = [
			'mail' => '', 
			'confirmMail' => '', 
			'password' => '', 
			'confirmPassword' => '', 
			'mailError' => '',
			'confirmMailError' => '',
			'passwordError' => '', 
			'confirmPasswordError' => '' 
		]; 

		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
			//Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$data = [
				'name' => trim($_POST['name']),
				'nameError' => trim($_POST['nameError']), 
				'lastName' => trim($_POST['lastName']), 
				'lastNameError' => trim($_POST['lastNameError']), 
				'mail' => trim($_POST['mail']), 
				'confirmMail' => trim($_POST['confirmMail']), 
				'password' => trim($_POST['password']), 
				'confirmPassword' => trim($_POST['confirmPassword']),
				'mailError' => trim($_POST['mailError']),
				'confirmMailError' => trim($_POST['confirmMailError']),
				'passwordError' => trim($_POST['passwordError']),
				'confirmPasswordError' => trim($_POST['confirmPasswordError'])
			]; 

			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$i";   

			// validate name 

			if(empty($data['name'])) {
				$data['nameError'] == 'Vous devez entrer un prénom'; 
			} elseif (!preg_match($nameValidation, $data['name'])) {
				$data['nameError'] == 'les prénoms ne peuvent contenir que des lettres et des chiffres'; 
			} 

			// validate last name

			if(empty($data['lastName'])) {
				$data['lastNameError'] == 'Vous devez entrer un nom'; 
			} elseif (!preg_match($nameValidation, $data['lastName'])) {
				$data['lastNameError'] == 'les snoms ne peuvent contenir que des lettres et des chiffres'; 
			} 

			 // validate email

			if(empty($data['mail'])) {
				$data['mailError'] == 'Vous devez entrer une adresse e-mail'; 
			} elseif (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
				$data['mailError'] == 'l\'adresse e-mail n\'est pas valide'; 
			} else {
				// check if e-mail exists 
				if($UserManager->findUserByMail($data['mail'])) {
					$data['mailError'] == 'un compte avec cette adresse e-mail existe déjà'; 
				}
			}

			//validate confirm mail 

			if(empty($data['confirMail'])) {
				$data['confirmMailError'] == 'Vous devez entrer une adresse e-mail'; 
			} else {
				if($data['mail'] != $data['confirmMail']) {
					$data['confirmMailError'] == 'les adresses e-mail ne correspondent pas'; 
				}
			}


			//validate password on length and numeric values

			if(empty($data['password'])) {
				$data['passwordError'] == 'Vous devez entrer un mot de passe'; 
			} elseif (strlen($data['password']) < 8) {
				$data['passwordError'] == 'le mot de passe doit faire au moins 8 caractères'; 
			} elseif (!preg_match($passwordValidation, $data['password'])) {
				$data['passwordError'] == 'Les mots de passe doivent contenir au moins un numéro'; 
			} 

			//validate confirm password

			if(empty($data['confirmPassword'])) {
				$data['confirmPasswordError'] == 'Vous devez confirmer votre mot de passe'; 
			} else {
				if($data['password'] != $data['confirmPassword']) {
					$data['confirmPasswordError'] == 'les mots de passe ne correspondent pas'; 
				}
			}

			//make sure that errors are empty

			if(empty($data['nameError']) && empty($data['lastNameError']) && empty($data['mailError']) && empty($data['cofirmMailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); 

				// Register user from model function 

				if ($UserManager->register($data)){
					// redirect to the login page
					header('location: index.php?action=login'); 
				} else {
					die('une erreur s\'est produite'); 
				}

			}
		}

		require('../public/view/frontend/login.php'); 
	}
}