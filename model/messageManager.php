<?php 

namespace Model; 

/**
* This class handles the interaction of the messages from the contact form and the DB
*/
class MessageManager extends Manager
 {
 	/**
	* This class sends an added message in the contact form to the DB
	*/	
	public function addMessage(Message $message)
	{
		// Preparation of the query
		$q = $this->db->prepare('INSERT INTO message (name, lastname, mail, messagecontent, creationDate) VALUES (:name, :lastName, :mail, :messageContent, NOW())'); 

		// We bind the values from $message to the query
		$q->bindValue('name', $message->getName()); 
		$q->bindValue('lastName', $message->getLastName()); 
		$q->bindValue('mail', $message->getMail()); 
		$q->bindValue('messageContent', $message->getMessageContent()); 

		// We execute the query
		$q->execute(); 

	}
 }