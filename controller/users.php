<?php

function chargerClassUsers($class)
{
	require('../../'.$class.'.php'); 
}

spl_autoload_register('chargerClassUsers'); 

class Users
{

	public function register()
	{
		$userManager = new ProjetBlog\Model\UserManager; 
		$user = new ProjetBlog\Model\User; 


		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
			//Sanitize post data
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$user->setName(trim($_POST_CLEAN['name'])); 
			$user->setLastName(trim($_POST_CLEAN['lastName'])); 
			$user->setMail(trim($_POST_CLEAN['mail'])); 
			$user->setConfirmMail(trim($_POST_CLEAN['confirmMail'])); 
			$user->setPassword(trim($_POST_CLEAN['password'])); 
			$user->setConfirmPassword(trim($_POST_CLEAN['confirmPassword'])); 


			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";   

			// validate name 

			if(empty($user->name())) {
				$user->setNameError('Vous devez entrer un prénom'); 
			} elseif (!preg_match($nameValidation, $user->name())) {
				$user->setNameError('les prénoms ne peuvent contenir que des lettres et des chiffres'); 
			} 

			// validate last name

			if(empty($user->lastName())) {
				$user->setLastNameError('Vous devez entrer un nom'); 
			} elseif (!preg_match($nameValidation, $user->lastName())) {
				$user->setLastNameError('les noms ne peuvent contenir que des lettres et des chiffres'); 
			} 

			 // validate email

			if(empty($user->mail())) {
				$user->setMailError('Vous devez entrer une adresse e-mail'); 
			} elseif (!filter_var($user->mail(), FILTER_VALIDATE_EMAIL)) {
				$user->setMailError('l\'adresse e-mail n\'est pas valide'); 
			} else {
				// check if e-mail exists 
				if($userManager->findUserByMail($user->mail())) {
					$user->setMailError('un compte avec cette adresse e-mail existe déjà'); 
				}
			}

			//validate confirm mail 

			if(empty($user->confirmMail())) {
				$user->setConfirmMailError('Vous devez entrer une adresse e-mail'); 
			} else {
				if($user->mail() != $user->confirmMail()) {
					$user->setConfirmMailError('les adresses e-mail ne correspondent pas'); 
				}
			}


			//validate password on length and numeric values

			if(empty($user->password())) {
				$user->setPasswordError('Vous devez entrer un mot de passe'); 
			} elseif (strlen($user->password()) < 8) {
				$user->setPasswordError('le mot de passe doit faire au moins 8 caractères'); 
			} elseif (!preg_match($passwordValidation, $user->password())) {
				$user->setPasswordError('Les mots de passe doivent contenir au moins un numéro'); 
			} 

			//validate confirm password

			if(empty($user->confirmPassword())) {
				$user->setConfirmPasswordError('Vous devez confirmer votre mot de passe'); 
			} else {
				if($user->password() != $user->confirmPassword()) {
					$user->setConfirmPasswordError('les mots de passe ne correspondent pas'); 
				}
			}

			//make sure that errors are empty

			if(empty($user->nameError()) && empty($user->lastNameError()) && empty($user->mailError()) && empty($user->confirmMailError()) && empty($user->passwordError()) && empty($user->confirmPasswordError())) {

				// Hash password
				$user->setPassword(password_hash($user->password(), PASSWORD_DEFAULT)); 

				// Register user from model function 

				if($userManager->register($user)){
					// redirect to the login page
					header('location: index.php?action=login'); 
				} else {
					die('une erreur s\'est produite'); 
				}
			}
		}

		require('../view/frontend/register.php');  
	}


	public function login()
	{
		$userManager = new ProjetBlog\Model\UserManager; 
		$user = new ProjetBlog\Model\User; 

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			// Sanitize post data

			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$user->setMail(trim($_POST_CLEAN['mail'])); 
			$user->setPassword(trim($_POST_CLEAN['password'])); 

			// validate mail
			if(empty($_POST_CLEAN['mail'])){
				$user->setMailError('vous devez entrer une adresse mail');
			}

			// validate password
			if(empty($_POST_CLEAN['password'])){
				$user->setPasswordError('vous devez entrer un mot de passe');
			}

			// check if all errors are empty

			if(empty($user->mailError()) && empty($user->passwordError())){
				$loggedInUser = $userManager->login($user->mail(), $user->password()); 

				if($loggedInUser){
					$this->createUserSession($loggedInUser); 
				} else {
					$user->setPasswordError('Le mot de passe ou l\'adresse mail est incorrect. Merci de réessayer.'); 
				}
			}
		}

		require('../view/frontend/login.php'); 
	}

	public function createUserSession($user){
		session_start(); 
		$_SESSION['userId'] = $user['id'] ; 
		$_SESSION['mail'] = $user['mail'] ; 

	}
}