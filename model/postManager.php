<?php

namespace Model; 

class PostManager extends Manager
{
	public function getAllPosts()
	{
		
		$q = $this->db->query('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.userId = user.id ORDER BY creationDate DESC LIMIT 0,5'); 
		return $q; 
	}

	public function getPost($postId)
	{
		
		$q = $this->db->prepare('SELECT post.*, user.name as author FROM post INNER JOIN user WHERE user.id = post.userId AND post.id = ?'); 
		$q->execute(array ($postId)); 
		$post = $q->fetch(); 

		return $post; 
	}

	public function updatePost(Post $post)
	{
		$q = $this->db->prepare('UPDATE post SET title = :title, topicId = :topicId, subtitle = :subtitle, content = :content, modificationDate = NOW() WHERE id = :id');           

		$q->bindValue(':title', $post->getTitle()); 
		$q->bindValue(':topicId', $post->getTopicId()); 
		$q->bindValue(':content', $post->getContent()); 
		$q->bindValue(':subtitle', $post->getSubtitle()); 
		$q->bindValue(':id', $post->getId()); 

		$q->execute(); 
	}

	public function addPost(Post $post)
	{
		
		$q = $this->db->prepare('INSERT INTO post (title, subtitle, topicId, content, userId, creationDate) VALUES (:title, :subtitle, :topicId, :content, :userId, NOW())'); 
		
		$q->bindValue('title', $post->title()); 
		$q->bindValue('subtitle', $post->subtitle()); 
		$q->bindValue('topicId', $post->topicId()); 
		$q->bindValue('userId', $post->userId());
		$q->bindValue('content', $post->content()); 

		$q->execute(); 
	}

	public function getAllUserPosts($userId)
	{

		$q = $this->db->prepare('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.userId = user.id AND userId = :userId ORDER BY creationDate DESC'); 
		$q->execute([':userId' => $userId]); 

		return $q; 

	}

}
