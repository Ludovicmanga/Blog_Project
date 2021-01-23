<?php

namespace Blog; 

class Message
{
	private $_id; 
	private $_name; 
	private $_lastName; 
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

	public function lastName()
	{
		return $this->_lastName; 
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

	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
		return $this->_lastName;  
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