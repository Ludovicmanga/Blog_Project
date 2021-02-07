<?php

namespace Model; 

class CommentManager extends Manager 
 {
 	/**
	* We take the comment that was written in the form and change the attribute to "toValidate", allowing a future validation
	*/
 	public function sendToValidation(comment $comment)
 	{
 		// Preparation of the query
 		$q = $this->db->prepare('INSERT INTO comment (commentContent, postId, validation, commentAuthor, creationDate) VALUES (:commentContent, :postId, "toValidate", :commentAuthor,  NOW())'); 

 		// we bind the values from $comment in the query
 		$q->bindValue('commentContent', $comment->getCommentContent()); 
 		$q->bindValue('postId', $comment->getPostId()); 
 		$q->bindValue('commentAuthor', $comment->getCommentAuthor()); 

 		// we execute the query
 		$q->execute(); 
 	} 

 	/**
	* We get all the comments needing validation and display them in the comment validation Page, in the admin section
	*/
 	public function getAllCommentsToValidate($userId)
 	{
 		// Preparation of the query
 		$q = $this->db->prepare('SELECT *, comment.id AS commentId FROM comment JOIN post WHERE post.Id = comment.postId AND validation = "toValidate" AND post.userId = ?'); 

 		// we execute and then return the query
 		$q->execute(array($userId)); 
 		return $q; 
 	}

 	/**
	* We get all the comments from a post to display them under it.
	*/
 	public function getAllPostComments($postId)
 	{
 		// Preparation of the query
 		$q = $this->db->prepare('SELECT * FROM comment JOIN post WHERE post.Id = comment.postId AND validation = "validated" AND post.id = ?'); 

 		// we execute and then return the query
 		$q->execute(array($postId)); 
 		return $q; 
 	}

 	/**
	* After validation of the comment by the user, we update the database, and chose the 'validation' attribute to 'validated'
	*/
 	public function validateComment($commentId)
 	{
 		// Preparation of the query
 		$q = $this->db->prepare('UPDATE comment SET validation="validated" WHERE id = ? '); 

 		// we execute the query
 		$q->execute(array($commentId)); 
 	}

 	/**
	* After denial of the comment validation by the user, we update the database, and chose the 'validation' attribute to 'validated'
	*/
 	public function denyComment($commentId)
 	{
 		// Preparation of the query
 		$q = $this->db->prepare('UPDATE comment SET validation="denied" WHERE id = ? '); 

 		// we execute the query
 		$q->execute(array($commentId)); 
 	}



 }