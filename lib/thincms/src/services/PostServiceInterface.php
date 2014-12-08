<?php
namespace lib\thincms\src\services;
/**
 * This interface provides different methods for managing post domain model
 */
interface PostServiceInterface{
	
	/**
	 * This method will crate new or update existing post in database
	 * @param  Post $post 
	 * @return boolean true or false    
	 */
	public function createOrUpdatePost($post);
	
	/**
	 * getPosts array by categories
	 * @param  array $categories
	 * @param  int $page_no
	 * @return array $post_array
	 */
	public function getPostsByCategories($categories,$page_no);

	/**
	 * get post by id
	 * @param  int  $post_id
	 * @return Post $post object
	 */
	public function getPostById($post_id)
	/**
	 * delete posts by ids
	 * @param  array   $post_ids
	 * @return boolean $status
	 */
	public function deletePostByIds($post_ids)
}