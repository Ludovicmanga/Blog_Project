<?php

namespace Model; 

/**
* This class handles the interaction of the messages from the contact form and the DB
*/
class TopicManager extends Manager
{
	/**
	* This allows us to get all topics from the DB 
	*/
	public function getAllTopics() 
	{
		// We operate the query
		$q = $this->db->query('SELECT * FROM topic'); 

		// We return the query result
		return $q; 
	}

}