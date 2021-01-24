<?php

namespace ProjetBlog\model; 

class User
{
	private $_name; 
	private $_nameError; 
	private $_lastName; 
	private $_lastNameError; 
	private $_mail; 
	private $_mailError; 
	private $_confirmMail; 
	private $_confirmMailError; 
	private $_password; 
	private $_passwordError;
	private $_confirmPassword; 
	private $_confirmPasswordError;

	//getters

	public function name() {
		return $this->_name; 
	}

	public function nameError() {
		return $this->_nameError;
	}

	public function lastName() {
		return $this->_lastName; 
	}

	public function lastNameError() {
		return $this->_lastNameError;
	}

	public function mail() {
		return $this->_mail; 
	}

	public function mailError() {
		return $this->_mailError; 
	}

	public function confirmMail() {
		return $this->_confirmMail; 
	}


	public function confirmMailError() {
		return $this->_confirmMailError; 
	}


	public function password() {
		return $this->_password; 
	}

	public function passwordError() {
		return $this->_passwordError; 
	}

	public function confirmPassword() {
		return $this->_confirmPassword; 
	}

	public function confirmPasswordError() {
		return $this->_confirmPasswordError; 
	}

	// Setters


	public function setName($name) {
		$this->_name == $name; 
		return $this->_name;  
	}

	public function setNameError($nameError) {
		$this->_nameError == $nameError; 
		return $this->_nameError;  
	}

	public function setlastName($lastName) {
		$this->_lastName == $lastName; 
		return $this->_lastName;  
	}

	public function setlastNameError($lastNameError) {
		$this->_lastNameError == $lastNameError; 
		return $this->_lastNameError;  
	}
	
	public function setMail($mail) {
		$this->_mail == $mail; 
		return $this->_mail;  
	}

	public function setMailError($mailError) {
		$this->_mailError == $mailError; 
		return $this->_mailError;  
	}


	public function setConfirmMail($confirmMail) {
		$this->_confirmMail == $confirmMail; 
		return $this->_confirmMail;  
	}

	public function setConfirmMailError($confirmMailError) {
		$this->_confirmMailError == $confirmMailError; 
		return $this->_confirmMailError;  
	}

	public function setPassword($password) {
		$this->_password == $password; 
		return $this->_password;  
	}

	public function setPasswordError($passwordError) {
		$this->_passwordError == $passwordError; 
		return $this->_passwordError;  
	}

	public function setConfirmPassword($confirmPassword) {
		$this->_confirmPassword == $confirmPassword; 
		return $this->_confirmPassword;  
	}

	public function setConfirmPasswordError($confirmPasswordError) {
		$this->_confirmPasswordError == $confirmPasswordError; 
		return $this->_confirmPasswordError;  
	}

}