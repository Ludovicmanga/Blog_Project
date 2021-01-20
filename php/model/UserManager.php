<?php

namespace Openclassrooms\blog; 


class UserManager
{
	protected $db; 

	public function __contruct ()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
	}

	public function register(User $user) 
	{
		$q = $this->db->prepare('INSERT INTO user (name, lastName, mail, password) VALUES (:name, :lastName, :mail, :password)'); 

		//bind values

		$q->bindValue('name', $user->name()); 
		$q->bindValue('lastName', $user->lastName()); 
		$q->bindValue('mail', $user->mail()); 
		$q->bindValue('password', $user->password());
		$q->execute(); 

	}

	// Find user by email. Email is passed in by the Controller.
	public function findUserByMail($mail)
	{
		$q = $this->db->query('SELECT * FROM users WHERE mail = :mail'); 
		$q->execute(array($mail)); 
		$user = $q->fetch(); 
		return $user ; 

		//check if email is already registered

		if($this->db::ROWCOUNT > 0) {
			return true; 
		} else {
			return false; 
		}

	}
}