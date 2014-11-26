<?php
namespace lib\thincms\src\services;

class AbstractServiceInterfaceImpl{
	
	private $table = null;
	public function __construct($table){

		$this->table = $table;

	}
	public function createOrUpdate ($obj, $id_field){
		
	}
	public function getObjectById($id){

	}
	public function getObjectsByCondition($condition_array){

	}
	public function getCount($condition_array){

	}
	public function deleteObject($obj){

	}
	public function deleteObjectsById($id_array){

	}	
}