<?php

namespace Model; 

class Message
{
	private $_id; 
	private $_name; 
	private $_lastName; 
	private $_mail; 
	private $_messageContent; 

	// setters

	public function setId($id)
	{
		$this->_id = $id;
		return $this;  
	}

	public function setName($name)
	{
		$this->_name = $name;
		return $this;  
	}

	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
		return $this;  
	}

	public function setMail($mail)
	{
		$this->_mail = $mail;
		return $this;  
	}

	public function setMessagecontent($messageContent)
	{
		$this->_messageContent = $messageContent;
		return $this;  
	}

	//getters

	public function getId()
	{
		return $this->_id; 
	}

	public function getName()
	{
		return $this->_name; 
	}

	public function getLastName()
	{
		return $this->_lastName; 
	}

	public function getMail()
	{
		return $this->_mail; 
	}

	public function getMessageContent()
	{
		return $this->_messageContent; 
	}


}