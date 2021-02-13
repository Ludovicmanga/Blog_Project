<?php

namespace Model; 

/**
* This class allows us to display the post entity 
*/
class Post
{
	//attributes

	private $_id; 
	private $_title; 
	private $_slug; 
	private $_image; 
	private $_content; 
	private $_userId; 
	private $_published; 
	private $_creationDate;
	private $_modificationDate; 
	private $_subtitle; 
	private $_topic;  

	//setters


	public function setId($id)
	{
		$this->_id = $id; 

		return $this; 
	}

	public function setTitle($title)
	{
		$this->_title = $title; 

		return $this; 
	}

	public function setSlug($slug)
	{
		$this->_slug = $slug; 
		return $this; 
	}

	public function setViews($views)
	{
		$this->_views = $views; 
		return $this; 
	}

	public function setImage($image)
	{
		$this->_image = $image; 
		return $this; 
	}

	public function setContent($content)
	{
		$this->_content = $content; 
		return $this; 
	}

	public function setUserId($userId)
	{
		$this->_userId = $userId; 
		return $this; 
	}

	public function setPublished($published)
	{
		$this->_published = $published; 
		return $this; 
	}

	public function setCreationDate($creationDate)
	{
		$this->_creationDate = $creationDate; 
		return $this; 
	}

	public function setModificationDate($modificationDate)
	{
		$this->_modificationDate = $modificationDate; 
		return $this;
	}

	public function setSubtitle($subtitle)
	{
		$this->_subtitle = $subtitle; 
		return $this;
	}

	public function setTopicId($topicId)
	{
		$this->_topicId = $topicId; 
		return $this;
	}

		//getters

	public function getId()
	{
		return $this->_id; 
	} 

	public function getTitle()
	{
		return $this->_title; 
	} 

	public function getSlug()
	{
		return $this->_slug; 
	} 

	public function getViews()
	{
		return $this->_views; 
	} 

	public function getImage()
	{
		return $this->_image; 
	} 

	public function getContent()
	{
		return $this->_content; 
	} 

	public function getUserId()
	{
		return $this->_userId; 
	} 

	public function getPublished()
	{
		return $this->_published; 
	} 

	public function getCreationDate()
	{
		return $this->_creation_date; 
	} 

	public function getModificationDate()
	{
		return $this->_modification_date; 
	} 

	public function getSubtitle()
	{
		return $this->_subtitle; 
	} 

	public function getTopicId()
	{
		return $this->_topicId; 
	} 


}