<?php
namespace lib\thincms\src\services;

interface AbstractServiceInterface{
	/**
	 * [createOrUpdate description]
	 * @param  [type] $obj      [description]
	 * @param  [type] $id_field [description]
	 * @return [type] $status of transaction
	 */
	public function createOrUpdate ($obj, $id_field)

	/**
	 * [getObjectById description]
	 * @param  [type] $id [description]
	 * @return [type] $return appropriate ROW object from query
	 */
	public function getObjectById($id)

	/**
	 * [getObjectsByCondition description]
	 * @param  [type] $condition_array [description]
	 * @return [type]                  [description]
	 */
	public function getObjectsByCondition($condition_array)

	/**
	 * [getCount description]
	 * @param  [type] $condition_array [description]
	 * @return [type] $status of transaction
	 */
	public function getCount($condition_array)
	
	/**
	 * [deleteObject description]
	 * @param  [type] $obj [description]
	 * @return [type] $status of transaction
	 */
	public function deleteObject($obj)
	
	/**
	 * [deleteObjectsById description]
	 * @param  [type] $id_array [description]
	 * @return [type] $status of transaction
	 */
	public function deleteObjectsById($id_array)	
}

