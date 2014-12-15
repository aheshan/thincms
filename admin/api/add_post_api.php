<?php

use lib\thincms\src\entities\Post;
use lib\thincms\src\services\PostService;
use lib\thincms\src\services\CategoryService;


$request_method = $_SERVER['REQUEST_METHOD'];
$post_obj = new Post();
$post_service = new PostService();
$category_service = new CategoryService();
$response = array("status"=>true,"response_message"=>"");
$post_id 	= isset($_GET['post_id'])?$_GET['post_id']:null;
$page_title = "Add New Post";

if(!is_null($post_id)){
	$post_obj 	= $post_service->getPostById($post_id);
	$page_title = "Update Post";
}
		
if($request_method === "POST"){ //handle post request
	
	$post 				= $_POST;
	$action 			= "";
	$post_categories 	=	isset($post['post_categories'])?implode(",",$post['post_categories']):null;
	// post_title
	if(empty(trim($post['post_title'])) || empty(trim($post['post_description']))){
		$response["status"] 			= false;
		$response["response_message"] 	= "Validation Error. Please fill necessary data.";
	}else{
		//all validated set values in object
		$post_obj->setPost_title($post['post_title']);
		$post_obj->setPost_description($post['post_description']);
		$post_obj->setPost_categories($post_categories);
	}

	if(empty($post_id)){
		$action = "save";
		$post_obj->setPost_date(date("Y-m-d H:i:s"));
	}else{
		$action = "update";
		$post_obj->setPost_id($post_id);
	}
	//check weather validation error exist or not
	if($response["status"]){
		switch($action){
			case 'save':

				if($post_service->savePost($post_obj)){
					$response["status"] 			= true;
					$response["response_message"] 	= "Post save successfully.";
				}else{
					$response["status"] 			= false;
					$response["response_message"] 	= "Error while saving post.";
				}
						
			break;

			case 'update':

				if($post_service->updatePost($post_obj)){
					$response["status"] 			= true;
					$response["response_message"] 	= "Post updated successfully.";
				}else{
					$response["status"] 			= false;
					$response["response_message"] 	= "Error while updating post.";
				}
				
			break;		

		}// end of switch case
	}// end of if($response["status"]){	
} // end of }else if($request_method === "POST"){ //handle post request

$post_obj_categories = explode(",",$post_obj->getPost_categories());
$categories_objs = $category_service->getAllCategories();