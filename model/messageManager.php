<?php 

namespace Model; 


class MessageManager extends Manager
 {
 	
	public function addMessage(Message $message)
	{
		$q = $this->db->prepare('INSERT INTO message (name, lastname, mail, messagecontent, creationDate) VALUES (:name, :lastName, :mail, :messageContent, NOW())'); 

		$q->bindValue('name', $message->getName()); 
		$q->bindValue('lastName', $message->getLastName()); 
		$q->bindValue('mail', $message->getMail()); 
		$q->bindValue('messageContent', $message->getMessageContent()); 

		$q->execute(); 

	}
 }