<?php
require '../../vendor/autoload.php';
use lib\thincms\src\entities\Category;
use lib\thincms\src\services\CategoryService;

$action 		= isset($_GET['action'])?$_GET['action']:null;
$request_method = $_SERVER['REQUEST_METHOD'];

$category = new Category();
$category_service = new CategoryService();

$response = array("status"=>false,"response_message"=>"");

if($request_method === "GET"){
	
	switch($action){
		case 'get_all':
			$categories_objs = $category_service->getAllCategories();
			
			echo json_encode($categories_objs);
			exit;
		break;
	}

}else if($request_method === "POST"){
	
	$json = file_get_contents('php://input');
	$obj = json_decode($json);

	switch($action){
		case 'save':
			$category->setCaregory_name($obj->cat_name);
			$category->setParent_cat_id($obj->cat_parent_id);

			if($category_service->saveCategory($category)){
				$response["status"] 			= true;
				$response["response_message"] 	= "Category save successfully.";
			}else{
				$response["status"] 			= false;
				$response["response_message"] 	= "Error while saving category.";
			}
			echo json_encode($response);
			exit;			
		break;

		case 'update':
			$category->setCategory_id($obj->cat_id);
			$category->setCaregory_name($obj->cat_name);
			$category->setParent_cat_id($obj->cat_parent_id);

			if($category_service->updateCategory($category)){
				$response["status"] 			= true;
				$response["response_message"] 	= "Category updated successfully.";
			}else{
				$response["status"] 			= false;
				$response["response_message"] 	= "Error while updating category.";
			}
			echo json_encode($response);
			exit;				
		break;		

		case 'delete':
			$category->setCategory_id($obj->category_id);
			if($category_service->deleteCategory($category)){
				$response["status"] 			= true;
				$response["response_message"] 	= "Category delete successfully.";
			}else{
				$response["status"] 			= false;
				$response["response_message"] 	= "Error while deleting category.";
			}
			echo json_encode($response);
			exit;			
		break;		
	}
} 