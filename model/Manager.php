<?php 

namespace ProjetBlog\Model; 

Class Manager
{
	protected $db; 

	public function __construct()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
	}
}