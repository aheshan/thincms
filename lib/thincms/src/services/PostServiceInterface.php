<?php
namespace lib\thincms\src\services;
/**
 * This interface provides different methods for managing post domain model
 */
interface PostServiceInterface{
	/**
	 * This method will crate new or update existing post in database
	 * @param  [Post] $post 
	 * @return [boolean]    
	 */
	public function createOrUpdatePost($post);
	
}