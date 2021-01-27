<?php

namespace ProjetBlog\Model; 

class TopicManager extends Manager
{
	public function getAllTopics() 
	{
		$q = $this->db->query('SELECT * FROM topic'); 

		return $q; 
	}



}