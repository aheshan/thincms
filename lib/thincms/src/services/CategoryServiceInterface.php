<?php
namespace lib\thincms\src\services;

use lib\thincms\src\entities\Category;
/**
 * This interface provides different methods for managing post domain model
 */
interface CategoryServiceInterface{
	/**
	 * get all categories
	 * @return Array Category array of category class
	 */
	public function getAllCategories();

	/**
	 * save New category to database
	 * @param  Category $category 
	 * @return boolean	operation status
	 */
	public function saveCategory(Category $category);

	/**
	 * update existing category
	 * @param  Category $category
	 * @return boolean	operation status
	 */
	public function updateCategory(Category $category);

	/**
	 * delete category
	 * @param  Category $category
	 * @return boolean	operation status
	 */
	public function deleteCategory(Category $category);
}