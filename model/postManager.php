<?php

namespace Model; 

/**
* This class handles the interaction between the posts and the DB
*/
class PostManager extends Manager
{
	/**
	 * We get the last 5 posts to display them
	 */
	public function getAllPosts()
	{
		$q = $this->db->query('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.userId = user.id ORDER BY creationDate DESC LIMIT 0,5'); 
		return $q; 
	}

	/**
	 * 	We get a specific post using the postId
	 */
	public function getPost($postId)
	{
		// Preparation of the query
		$q = $this->db->prepare('SELECT post.*, user.name as author FROM post INNER JOIN user WHERE user.id = post.userId AND post.id = ?'); 

		// We execute the query
		$q->execute(array ($postId)); 
		$post = $q->fetch(); 

		return $post; 
	}

	/**
	 * 	We get the posts from a specific user, using the userId
	 */
	public function getAllUserPosts($userId)
	{
		// Preparation of the query
		$q = $this->db->prepare('SELECT *, post.id AS post_id, name AS author FROM post INNER JOIN user WHERE post.userId = user.id AND userId = :userId ORDER BY creationDate DESC'); 

		// We execute the query
		$q->execute([':userId' => $userId]); 
		return $q; 
	}

	/**
	 * 	For the checking of the number of views - we add to the DB the incremented view in the post table
	 */
	function addIncrementedPostViews(Post $post)
	{
		// Preparation of the query
		$q = $this->db->prepare('UPDATE post SET views = :views WHERE id = :id'); 

		// We bind the value of $post to the query  
		$q->bindValue('views', $post->getViews()); 
		$q->bindValue('id', $post->getId()); 

		// We execute the query
		$q->execute(); 
	}

	/**
	 * 	Wee update the post table with the updated value
	 */
	public function updatePost(Post $post)
	{	
		// Preparation of the query
		$q = $this->db->prepare('UPDATE post SET title = :title, topicId = :topicId, subtitle = :subtitle, content = :content, modificationDate = NOW() WHERE id = :id');	

		// We bind the value o f $post to the query          	
		$q->bindValue(':title', $post->getTitle()); 
		$q->bindValue(':topicId', $post->getTopicId()); 
		$q->bindValue(':content', $post->getContent()); 
		$q->bindValue(':subtitle', $post->getSubtitle()); 
		$q->bindValue(':id', $post->getId()); 

		// We execute the query
		$q->execute(); 
	}

	/**
	 * 	We add the post that just was created with the post creation form 
	 */
	public function addPost(Post $post)
	{
		// Preparation of the query
		$q = $this->db->prepare('INSERT INTO post (title, subtitle, topicId, content, userId, creationDate) VALUES (:title, :subtitle, :topicId, :content, :userId, NOW())'); 
		
		// We bind the value o f $post to the query
		$q->bindValue('title', $post->getTitle()); 
		$q->bindValue('subtitle', $post->getSubtitle()); 
		$q->bindValue('topicId', $post->getTopicId()); 
		$q->bindValue('userId', $post->getUserId());
		$q->bindValue('content', $post->getContent()); 

		// We execute the query
		$q->execute(); 
	}

}
