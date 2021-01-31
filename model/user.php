<?php

namespace Model; 

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


	// Setters


	public function setName($name) {
		$this->_name = $name; 
		return $this;  
	}

	public function setNameError($nameError) {
		$this->_nameError = $nameError; 
		return $this;  
	}

	public function setlastName($lastName) {
		$this->_lastName = $lastName; 
		return $this;  
	}

	public function setlastNameError($lastNameError) {
		$this->_lastNameError = $lastNameError; 
		return $this;  
	}
	
	public function setMail($mail) {
		$this->_mail = $mail; 
		return $this;  
	}

	public function setMailError($mailError) {
		$this->_mailError = $mailError; 
		return $this;  
	}


	public function setConfirmMail($confirmMail) {
		$this->_confirmMail = $confirmMail; 
		return $this;  
	}

	public function setConfirmMailError($confirmMailError) {
		$this->_confirmMailError = $confirmMailError; 
		return $this->_confirmMailError;  
	}

	public function setPassword($password) {
		$this->_password = $password; 
		return $this->_password;  
	}

	public function setPasswordError($passwordError) {
		$this->_passwordError = $passwordError; 
		return $this;  
	}

	public function setConfirmPassword($confirmPassword) {
		$this->_confirmPassword = $confirmPassword; 
		return $this;  
	}

	public function setConfirmPasswordError($confirmPasswordError) {
		$this->_confirmPasswordError = $confirmPasswordError; 
		return $this;  
	}

	//getters

	public function getName() {
		return $this->_name; 
	}

	public function getNameError() {
		return $this->_nameError;
	}

	public function getLastName() {
		return $this->_lastName; 
	}

	public function getLastNameError() {
		return $this->_lastNameError;
	}

	public function getMail() {
		return $this->_mail; 
	}

	public function getMailError() {
		return $this->_mailError; 
	}

	public function confirmMail() {
		return $this->_confirmMail; 
	}


	public function getConfirmMailError() {
		return $this->_confirmMailError; 
	}


	public function getPassword() {
		return $this->_password; 
	}

	public function getPasswordError() {
		return $this->_passwordError; 
	}

	public function getConfirmPassword() {
		return $this->_confirmPassword; 
	}

	public function getConfirmPasswordError() {
		return $this->_confirmPasswordError; 
	}


}