<?php

namespace Openclassrooms\blog; 

class Message
{
	private $_id; 
	private $_name; 
	private $_lastname; 
	private $_mail; 
	private $_messageContent; 

	public function id()
	{
		return $this->_id; 
	}

	public function name()
	{
		return $this->_name; 
	}

	public function lastname()
	{
		return $this->_lastname; 
	}

	public function mail()
	{
		return $this->_mail; 
	}

	public function messageContent()
	{
		return $this->_messageContent; 
	}

	public function setId($id)
	{
		$this->_id = $id;
		return $this->_id;  
	}

	public function setName($name)
	{
		$this->_name = $name;
		return $this->_name;  
	}

	public function setLastname($lastname)
	{
		$this->_lastname = $lastname;
		return $this->_lastname;  
	}

	public function setMail($mail)
	{
		$this->_mail = $mail;
		return $this->_mail;  
	}

	public function setMessagecontent($messageContent)
	{
		$this->_messageContent = $messageContent;
		return $this->_messageContent;  
	}

}