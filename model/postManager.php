<?php

namespace ProjetBlog\Model; 

class PostManager extends Manager
{

	public function getAllPosts()
	{
		
		$req = $this->db->query('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.userId = user.id ORDER BY creationDate DESC LIMIT 0,5'); 
		return $req; 
	}

	public function getPost($postId)
	{
		
		$req = $this->db->prepare('SELECT post.*, user.name as author FROM post INNER JOIN user WHERE user.id = post.userId AND post.id = ?'); 
		$req->execute(array ($postId)); 
		$post = $req->fetch(); 

		return $post; 
	}

	public function updatePost(Post $post)
	{
		$q = $this->db->prepare('UPDATE post SET title = :title, topicId = :topicId, subtitle = :subtitle, content = :content, modificationDate = NOW() WHERE id = :id');           

		$q->bindValue(':title', $post->title(), \PDO::PARAM_INT); 
		$q->bindValue(':topicId', $post->topicId(), \PDO::PARAM_INT); 
		$q->bindValue(':content', $post->content(), \PDO::PARAM_INT); 
		$q->bindValue(':subtitle', $post->subtitle(), \PDO::PARAM_INT); 
		$q->bindValue(':id', $post->id(), \PDO::PARAM_INT); 

		$q->execute(); 
	}

	public function addPost(Post $post)
	{
		if(filter_var($post->title(), FILTER_SANITIZE_STRING) OR filter_var($post->subtitle(), FILTER_SANITIZE_STRING) OR filter_var($post->content(), FILTER_SANITIZE_STRING)  OR filter_var($post->userId(), FILTER_SANITIZE_NUMBER_INT ) OR filter_var($post->topicId(), FILTER_SANITIZE_NUMBER_INT))
		{ 
		$q = $this->db->prepare('INSERT INTO post (title, subtitle, topicId, content, userId, creationDate) VALUES (:title, :subtitle, :topicId, :content, :userId, NOW())'); 
		
		$q->bindValue('title', $post->title()); 
		$q->bindValue('subtitle', $post->subtitle()); 
		$q->bindValue('topicId', $post->topicId()); 
		$q->bindValue('userId', $post->userId());
		$q->bindValue('content', $post->content()); 

		$q->execute(); 
		} else {
			throw New Exception('les charactères ne sont pas acceptés'); 
		}
	}
}
