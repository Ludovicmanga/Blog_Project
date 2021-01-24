<?php

namespace ProjetBlog\model; 

class Post
{
	//attribute
	private $_id; 
	private $_title; 
	private $_slug; 
	private $_views;
	private $_image; 
	private $_content; 
	private $_userId; 
	private $_published; 
	private $_creationDate;
	private $_modificationDate; 
	private $_subtitle; 
	private $_topicId;  

	//methods
	//setters

	public function setId($id)
	{
		$this->_id = $id; 
		return $this->_id; 
	}

	public function setTitle($title)
	{
		$this->_title = $title; 
		return $this->_title; 
	}

	public function setSlug($slug)
	{
		$this->_slug = $slug; 
		return $this->_slug; 
	}

	public function setViews($views)
	{
		$this->_views = $views; 
		return $this->_views; 
	}

	public function setImage($image)
	{
		$this->_image = $image; 
		return $this->_image; 
	}

	public function setContent($content)
	{
		$this->_content = $content; 
		return $this->_content; 
	}

	public function setUserId($userId)
	{
		$this->_userId = $userId; 
		return $this->_userId; 
	}

	public function setPublished($published)
	{
		$this->_published = $published; 
		return $this->_published; 
	}

	public function setCreationDate($creationDate)
	{
		$this->_creationDate = $creationDate; 
		return $this->_creationDate; 
	}

	public function setModificationDate($modificationDate)
	{
		$this->_modificationDate = $modificationDate; 
		return $this->_modificationDate;
	}

	public function setSubtitle($subtitle)
	{
		$this->_subtitle = $subtitle; 
		return $this->_subtitle;
	}

	public function setTopicId($topicId)
	{
		$this->_topicId = $topicId; 
		return $this->_topicId;
	}


		//getters

	public function id()
	{
		return $this->_id; 
	} 

	public function title()
	{
		return $this->_title; 
	} 

	public function slug()
	{
		return $this->_slug; 
	} 

	public function views()
	{
		return $this->_views; 
	} 

	public function image()
	{
		return $this->_image; 
	} 

	public function content()
	{
		return $this->_content; 
	} 

	public function userId()
	{
		return $this->_userId; 
	} 

	public function published()
	{
		return $this->_published; 
	} 

	public function creationDate()
	{
		return $this->_creation_date; 
	} 

	public function modificationDate()
	{
		return $this->_modification_date; 
	} 

	public function subtitle()
	{
		return $this->_subtitle; 
	} 

	public function topicId()
	{
		return $this->_topicId; 
	} 


	public function hydrate()
	{
		
	}
}