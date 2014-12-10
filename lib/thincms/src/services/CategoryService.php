<?php
namespace lib\thincms\src\services;

use lib\database\DBUtils;
use lib\thincms\src\entities\Category;

class CategoryService implements CategoryServiceInterface{

	private $dbUtil = null;

	public function __construct(){
		$this->dbUtil = DBUtils::getInstance();
	}

	public function getAllCategories(){

		$categories_results = $this->dbUtil->performDBAction('get_more',
							"select * from categories",
							null
						);
						  
		return $categories_results;
	}

	public function saveCategory(Category $category){
		$insert_status = $this->dbUtil->performDBAction('update',
							"insert into categories (category_name,parent_id) values(:category_name,:parent_id)",
							array(
								'category_name' => $category->getCaregory_name(),
								'parent_id' => $category->getParent_cat_id()
								)
						);
		if($insert_status)
			return true;
		return flase;
	}

	public function updateCategory(Category $category){
		$update_status = $this->dbUtil->performDBAction('update',
							"update categories set category_name=:category_name,parent_id=:parent_id 
							where category_id=:category_id",
							array(
								'category_name' => $category->getCaregory_name(),
								'parent_id' 	=> $category->getParent_cat_id(),
								'category_id' 	=> $category->getCategory_id()
								)
						);
		if($update_status)
			return true;
		return flase;		

	}

	public function deleteCategory(Category $category){		
		$delete_status = $this->dbUtil->performDBAction('delete',
							"delete from categories where category_id=:category_id",
							array('category_id' => $category->getCategory_id())
						);

		if($delete_status)
			return true;
		return flase;
	}
	
}
