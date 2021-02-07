<?php

namespace Model; 

/**
* This class handles the interaction of the messages between the users and the DB
*/
class UserManager extends Manager
{
	/**
	 * We operate registration in the DB 
	 */
	public function register(User $user) 
	{
		// We send the data from the object user to the DB
		$q = $this->db->prepare('INSERT INTO user (name, lastName, mail, password) VALUES (:name, :lastName, :mail, :password)'); 
		$q->bindValue('name', $user->getName()); 
		$q->bindValue('lastName', $user->getLastName()); 
		$q->bindValue('mail', $user->getMail()); 
		$q->bindValue('password', $user->getPassword());

		// if registration is successful, return a Boolean
		if($q->execute()) {
			return true; 
		} else {
			return false; 
		}
	}

	/**
	 * We operate registration in the DB 
	 */
	public function login($mail, $password) {
		//preparation of the query
		$q = $this->db->prepare('SELECT * FROM user WHERE mail = :mail'); 
		
		// We bind data from $mail to the query
		$q->execute([':mail' => $mail]); 

		// we get the password from the DB, and compare it with the input from the login form. Return a boolean
		$row = $q->fetch(); 
		$hashedPassword = $row['password']; 
		if(password_verify($password, $hashedPassword)){
			return $row; 
		} else {
			return false; 
		}
	}

	// Find user by email. Email is passed in by the  users Controller.
	public function findUserByMail($mail)
	{
		// We try to get a user that matches the email in the DB
		$q = $this->db->prepare('SELECT * FROM user WHERE mail = :mail'); 
		$q->execute([':mail' => $mail]); 
		$userReturn = $q->fetch(\PDO::FETCH_ASSOC); 
		return $userReturn ; 

		//check if email is already registered and return a Boolean
		if($q->rowCount() > 0) {
			return true; 
		} else {
			return false; 
		}
	}
}