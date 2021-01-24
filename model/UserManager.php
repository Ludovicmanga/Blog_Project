<?php

namespace ProjetBlog\Model; 

class UserManager extends Manager
{

	public function register(User $user) 
	{
		$q = $this->db->prepare('INSERT INTO user (name, lastName, mail, password) VALUES (:name, :lastName, :mail, :password)'); 

		//bind values

		$q->bindValue('name', $user->name()); 
		$q->bindValue('lastName', $user->lastName()); 
		$q->bindValue('mail', $user->mail()); 
		$q->bindValue('password', $user->password());

		if($q->execute()) {
			return true; 
		} else {
			return false; 
		}
	}

	// Find user by email. Email is passed in by the Controller.
	public function findUserByMail($mail)
	{
		$q = $this->db->prepare('SELECT * FROM user WHERE mail = :mail'); 
		$q->execute([':mail' => $mail]); 
		$userReturn = $q->fetch(\PDO::FETCH_ASSOC); 
		return $userReturn ; 

		//check if email is already registered

		if($q->rowCount() > 0) {
			return true; 
		} else {
			return false; 
		}

	}
}