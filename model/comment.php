<?php

namespace Model; 

/**
* This class allows us to display the comment entity
*/
Class Comment 
{

	//attributes

	private $_id; 
	private $_commentContent;
	private $_postId; 
	private $_validation; 
	private $_commentAuthor;


	// setters

	public function setId($id)
	{
		$this->_id = $id; 

		return $this; 
	}

	public function setCommentContent($commentContent)
	{
		$this->_commentContent = $commentContent; 

		return $this; 
	}

	public function setPostId($postId)
	{
		$this->_postId = $postId; 

		return $this; 
	}


	public function setValidation($validation)
	{
		$this->validation = $validation; 

		return $this; 
	}

	public function setCommentAuthor($commentAuthor)
	{
		$this->commentAuthor = $commentAuthor; 

		return $this; 
	}

	//getters

	public function getId()
	{
		return $this->_id; 
	} 

	public function getCommentContent()
	{
		return $this->_commentContent; 
	} 

	public function getPostId()
	{
		return $this->_postId; 
	} 

	public function getValidation()
	{
		return $this->_validation; 
	} 

	public function getCommentAuthor()
	{
		return $this->commentAuthor; 
	} 

}