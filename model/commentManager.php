<?php

namespace Model; 

class CommentManager extends Manager 
 {
 	public function sendToValidation(comment $comment)
 	{
 		$q = $this->db->prepare('INSERT INTO comment (commentContent, postId, validation, commentAuthor, creationDate) VALUES (:commentContent, :postId, "toValidate", :commentAuthor,  NOW())'); 

 		$q->bindValue('commentContent', $comment->getCommentContent()); 
 		$q->bindValue('postId', $comment->getPostId()); 
 		$q->bindValue('commentAuthor', $comment->getCommentAuthor()); 


 		$q->execute(); 
 	} 

 	public function getAllCommentsToValidate($userId)
 	{
 		$q = $this->db->prepare('SELECT *, comment.id AS commentId FROM comment JOIN post WHERE post.Id = comment.postId AND validation = "toValidate" AND post.userId = ?'); 
 		$q->execute(array($userId)); 

 		return $q; 
 	}

 	public function getAllPostComments($postId)
 	{
 		$q = $this->db->prepare('SELECT * FROM comment JOIN post WHERE post.Id = comment.postId AND validation = "validated" AND post.id = ?'); 
 		$q->execute(array($postId)); 

 		return $q; 
 	}


 	public function validateComment($commentId)
 	{
 		$q = $this->db->prepare('UPDATE comment SET validation="validated" WHERE id = ? '); 

 		$q->execute(array($commentId)); 
 	}

 	public function denyComment($commentId)
 	{
 		$q = $this->db->prepare('UPDATE comment SET validation="denied" WHERE id = ? '); 

 		$q->execute(array($commentId)); 
 	}



 }