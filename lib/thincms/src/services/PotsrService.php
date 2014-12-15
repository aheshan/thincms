<?php
namespace lib\thincms\src\services;

use lib\database\DBUtils;
use lib\thincms\src\entities\Post;

class PostService implements PostServiceInterface {

	private $dbUtil = null;

	public function __construct(){
		$this->dbUtil = DBUtils::getInstance();
	}
	
	public function getPostsByCategory($category_id = null){
		$sql = "";
		if(!is_null($category_id))
			$sql = "select * from posts where FIND_IN_SET(".$category_id.",post_categories)";
		else
			$sql = "select * from posts";
		$categories_results = $this->dbUtil->performDBAction('get_more',
							$sql,
							null
						);
						  
		return $categories_results;
	}
	public function savePost(Post $post){
		$insert_status = $this->dbUtil->performDBAction('update',
							"insert into posts (post_title,post_description,post_date,post_categories) 
							values(:post_title,:post_description,:post_date,:post_categories)",
							array(
								'post_title' 		=> $post->getPost_title(),
								'post_description' 	=> $post->getPost_description(),
								 'post_date' 		=> $post->getPost_date(),
								 'post_categories' 	=> $post->getPost_categories()
								)
						);
		if($insert_status)
			return true;
		return flase;
	}
	
	public function updatePost(Post $post){
		$update_status = $this->dbUtil->performDBAction('update',
							"update posts set post_title=:post_title,post_description=:post_description
							,post_categories=:post_categories where post_id=:post_id",
							array(
								'post_title' 		=> $post->getPost_title(),
								'post_description' 	=> $post->getPost_description(),
								'post_categories' 	=> $post->getPost_categories(),
								'post_id' 			=> $post->getPost_id()
								)
						);
		if($update_status)
			return true;
		return flase;	
	}
	
	public function getPostById($post_id){
		$post_result = $this->dbUtil->performDBAction('get_signle',
							"select * from posts where post_id=:post_id",
							array(
							'post_id' => $post_id
							)
						);
		$post = new Post($post_result);				  
		return $post;
	}
	
	public function deletePost(Post $post){
		$delete_status = $this->dbUtil->performDBAction('delete',
							"delete from posts where post_id=:post_id",
							array('post_id' => $post->getPost_id())
						);

		if($delete_status)
			return true;
		return flase;
	}
}
