<?php 

namespace Openclassrooms\blog; 

require ('manager.php'); 

class MessageManager extends Manager
 {
 	protected $db; 

	// construct

	public function __construct()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
	}

	public function addMessage(Message $message)
	{
		$q = $this->db->prepare('INSERT INTO message (name, lastname, mail, message) VALUES (:name, :lastname, :mail, :messageContent)'); 

		$q->bindValue('name', $message->name()); 
		$q->bindValue('lastname', $message->lastname()); 
		$q->bindValue('mail', $message->mail()); 
		$q->bindValue('messageContent', $message->messageContent()); 

		$q->execute(); 
	}
 }