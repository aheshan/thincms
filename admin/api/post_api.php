<?php
require '../../vendor/autoload.php';
use lib\thincms\src\entities\Post;
use lib\thincms\src\services\PostService;

$action 		= isset($_GET['action'])?$_GET['action']:null;
$request_method = $_SERVER['REQUEST_METHOD'];

$post = new Post();
$post_service = new PostService();

$response = array("status"=>false,"response_message"=>"");

if($request_method === "GET"){
	
	switch($action){
		case 'get_all':
			$category_id 	= isset($_GET['category_id'])?$_GET['category_id']:null;
			$posts_objs = $post_service->getPostsByCategory($category_id);
			
			echo json_encode($posts_objs);
			exit;
	}

}else if($request_method === "POST"){
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json);

	switch($action){

		case 'delete':
			$post->setPost_id($obj->post_id);
			if($post_service->deletePost($post)){
				$response["status"] 			= true;
				$response["response_message"] 	= "Post delete successfully.";
			}else{
				$response["status"] 			= false;
				$response["response_message"] 	= "Error while deleting post.";
			}
			echo json_encode($response);
			exit;			
		break;		
	}
} 