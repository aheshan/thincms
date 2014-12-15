<?php
namespace lib\thincms\src\services;

use lib\thincms\src\entities\Post;
/**
 * This interface provides different methods for managing post domain model
 */
interface PostServiceInterface{
	
	/**
	 * This method will crate new or update existing post in database
	 * @param  Post $post 
	 * @return boolean true or false    
	 */
	public function savePost(Post $post);
	
	/**
	 * update existing post
	 * @param  Post $post 
	 * @return boolean true or false    
	 */
	public function updatePost(Post $post);
	/**
	 * getPosts array by categories
	 * @param  array $categories
	 * @param  int $page_no
	 * @return array $post_array
	 */
	public function getPostsByCategory($category_id = null);

	/**
	 * get post by id
	 * @param  int  $post_id
	 * @return Post $post object
	 */
	public function getPostById($post_id);
	/**
	 * delete posts by ids
	 * @param  POst   $post
	 * @return boolean $status
	 */
	public function deletePost(Post $post);
}