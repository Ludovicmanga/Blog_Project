<?php

use Openclassrooms\blog\UserManager;
use Openclassrooms\blog\User;

require('../model/UserManager.php');
require('../model/User.php');

class Users
{
	public function login()
	{
		$userManager = new UserManager; 
		$user = new User; 

		$data = [
			'mailError' => '',
			'passwordError' => '', 

		]; 

		require('../view/frontend/login.php'); 
	}

	public function register()
	{
		$userManager = new UserManager; 
		$user = new User; 


		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
			//Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			$user->setName(trim($_POST['name'])); 
			$user->setNameError(trim($_POST['nameError'])); 
			$user->setLastName(trim($_POST['lastName'])); 
			$user->setLastNameError(trim($_POST['lastNameError'])); 
			$user->setMail(trim($_POST['mail'])); 
			$user->setMailError(trim($_POST['mailError']));
			$user->setConfirmMail(trim($_POST['confirmMail'])); 
			$user->setConfirmMailError(trim($_POST['confirmMailError'])); 
			$user->setPassword(trim($_POST['password'])); 
			$user->setPasswordError(trim($_POST['passwordError'])); 
			$user->setConfirmPassword(trim($_POST['confirmPassword'])); 
			$user->setConfirmPasswordError(trim($_POST['confirmPasswordError'])); 


			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$i";   

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
				$user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT)); 

				// Register user from model function 

				if ($userManager->register($user)){
					// redirect to the login page
					header('location: index.php?action=login'); 
				} else {
					die('une erreur s\'est produite'); 
				}

			}
		}

		require('../view/frontend/register.php');  
	}
}