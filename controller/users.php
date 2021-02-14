<?php

namespace Controller; 

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
	Message,
	Comment,
	CommentManager
}; 

class Users
{
	/**
	 * We display the registration form and operate the registration system
	 */
	public function register()
	{
		$userManager = new UserManager; 
		$user = new User; 	

		//We check whether the registrayion formm was filled and sanitize $_POST data
		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			// We hydrate the user object
			$user
				->setName(trim($_POST_CLEAN['name']))
				->setLastName(trim($_POST_CLEAN['lastName']))
				->setMail(trim($_POST_CLEAN['mail']))
				->setConfirmMail(trim($_POST_CLEAN['confirmMail']))
				->setPassword(trim($_POST_CLEAN['password']))
				->setConfirmPassword(trim($_POST_CLEAN['confirmPassword']))
			; 

			// We use REGEX to define accepted characters in password and names
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

		// We display the view
		require '../view/frontend/register.php';  
	}

	public function login()
	{
		$userManager = new UserManager; 
		$user = new User; 

		// We check whether the login form was filled and clean $_POST data
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

			// if so, we assign the form input to the user object
			$user->setMail(trim($_POST_CLEAN['mail'])); 
			$user->setPassword(trim($_POST_CLEAN['password'])); 

			// We set errors if any input form is empty
			if(empty($_POST_CLEAN['mail'])){
				$user->setMailError('vous devez entrer une adresse mail');
			}
			if(empty($_POST_CLEAN['password'])){
				$user->setPasswordError('vous devez entrer un mot de passe');
			}

			// We check if all errors are empty / If not, we create an error message
			if(empty($user->getMailError()) && empty($user->getPasswordError())){

				// We operate the login process in DB
				$loggedInUser = $userManager->login($user->getMail(), $user->getPassword()); 

				// if the login process is successful, we create a user session
				if($loggedInUser){
					$this->createUserSession($loggedInUser); 
				} else {
					$user->setPasswordError('Le mot de passe ou l\'adresse mail est incorrect. Merci de réessayer.'); 
				}
			}
		}

		// We display the view
		require'../view/frontend/login.php'; 
	}

	public function createUserSession($user){
		session_start(); 
		$_SESSION['userId'] = $user['id'] ; 
		$_SESSION['mail'] = $user['mail'] ; 
	}

	/**
	* We display the post admin page
	*/ 
	public function admin()
	{
		require '../view/frontend/admin.php'; 
	}

	public function logout()
	{
		// We display the view 'logout'
		require '../view/frontend/logout.php'; 
	}

}