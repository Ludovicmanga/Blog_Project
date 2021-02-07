<?php 

namespace Model;

/**
* Class that will allow to avoid writing the PDO creation instruction for every Manager type class
*/ 

Class Manager
{
	protected $db; 

	public function __construct()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
	}
}