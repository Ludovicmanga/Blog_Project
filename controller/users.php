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


class Users
{

	public function register()
	{
		$userManager = new UserManager; 
		$user = new User; 


		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
			//Sanitize post data
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$user
				->setName(trim($_POST_CLEAN['name']))
				->setLastName(trim($_POST_CLEAN['lastName']))
				->setMail(trim($_POST_CLEAN['mail']))
				->setConfirmMail(trim($_POST_CLEAN['confirmMail']))
				->setPassword(trim($_POST_CLEAN['password']))
				->setConfirmPassword(trim($_POST_CLEAN['confirmPassword']))
			; 


			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";   

			// validate name 

			if(empty($user->getName())) {
				$user->setNameError('Vous devez entrer un prénom'); 
			} elseif (!preg_match($nameValidation, $user->getName())) {
				$user->setNameError('les prénoms ne peuvent contenir que des lettres et des chiffres'); 
			} 

			// validate last name

			if(empty($user->getLastName())) {
				$user->setLastNameError('Vous devez entrer un nom'); 
			} elseif (!preg_match($nameValidation, $user->getLastName())) {
				$user->setLastNameError('les noms ne peuvent contenir que des lettres et des chiffres'); 
			} 

			 // validate email

			if(empty($user->getMail())) {
				$user->setMailError('Vous devez entrer une adresse e-mail'); 
			} elseif (!filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)) {
				$user->setMailError('l\'adresse e-mail n\'est pas valide'); 
			} else {
				// check if e-mail exists 
				if($userManager->findUserByMail($user->getMail())) {
					$user->setMailError('un compte avec cette adresse e-mail existe déjà'); 
				}
			}

			//validate confirm mail 

			if(empty($user->confirmMail())) {
				$user->setConfirmMailError('Vous devez entrer une adresse e-mail'); 
			} else {
				if($user->getMail() != $user->confirmMail()) {
					$user->setConfirmMailError('les adresses e-mail ne correspondent pas'); 
				}
			}


			//validate password on length and numeric values

			if(empty($user->getPassword())) {
				$user->setPasswordError('Vous devez entrer un mot de passe'); 
			} elseif (strlen($user->getPassword()) < 8) {
				$user->setPasswordError('le mot de passe doit faire au moins 8 caractères'); 
			} elseif (!preg_match($passwordValidation, $user->getPassword())) {
				$user->setPasswordError('Les mots de passe doivent contenir au moins un numéro'); 
			} 

			//validate confirm password

			if(empty($user->getConfirmPassword())) {
				$user->setConfirmPasswordError('Vous devez confirmer votre mot de passe'); 
			} else {
				if($user->getPassword() != $user->getConfirmPassword()) {
					$user->setConfirmPasswordError('les mots de passe ne correspondent pas'); 
				}
			}

			//make sure that errors are empty

			if(empty($user->getNameError()) && empty($user->getLastNameError()) && empty($user->getMailError()) && empty($user->getConfirmMailError()) && empty($user->getPasswordError()) && empty($user->getConfirmPasswordError())) {

				// Hash password
				$user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT)); 

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
		$userManager = new UserManager; 
		$user = new User; 

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

			if(empty($user->getMailError()) && empty($user->getPasswordError())){
				$loggedInUser = $userManager->login($user->getMail(), $user->getPassword()); 

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

	public function logout()
	{
		require('../view/frontend/logout.php'); 
	}

}