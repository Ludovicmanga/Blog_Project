<?php

namespace Openclassrooms\blog; 

class PostManager
{

	protected $db; 

	// construct

	public function __construct()
	{
		$this->db = new \PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
	}

	public function getAllPosts()
	{
		$db = $this->dbConnect(); 
		$req = $db->query('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.user_id = user.id ORDER BY creation_date DESC LIMIT 0,5'); 
		return $req; 
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect(); 
		$req = $db->prepare('SELECT post.*, user.name as author FROM post INNER JOIN user WHERE user.id = post.user_id AND post.id = ?'); 
		$req->execute(array ($postId)); 
		$post = $req->fetch(); 

		return $post; 
	}

	public function updatePost(Post $post)
	{
		$q = $this->db->prepare('UPDATE post SET title = :title, topic = :topic, subtitle = :subtitle, content = :content WHERE id = :id');           

		$q->bindValue(':title', $post->title(), \PDO::PARAM_INT); 
		$q->bindValue(':topic', $post->topic(), \PDO::PARAM_INT); 
		$q->bindValue(':content', $post->content(), \PDO::PARAM_INT); 
		$q->bindValue(':subtitle', $post->subtitle(), \PDO::PARAM_INT); 
		$q->bindValue(':id', $post->id(), \PDO::PARAM_INT); 

		$q->execute(); 

	}

	public function addPost(Post $post)
	{
		$q = $this->db->prepare('INSERT INTO post (title, subtitle, topic, content) VALUES (:title, :subtitle, :topic, :content)'); 

		$q->bindValue('title', $post->title()); 
		$q->bindValue('subtitle', $post->subtitle()); 
		$q->bindValue('topic', $post->topic()); 
		$q->bindValue('content', $post->content()); 

		$q->execute(); 
	}
}

