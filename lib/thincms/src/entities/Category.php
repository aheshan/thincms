<?php
namespace lib\thincms\src\entities;

/**
 * category class
 */
class Category {
	
	private $category_id;
	private $caregory_name;
	private $parent_cat_id;

	public function __construct(){

	}

    /**
     * PHP getter magic method
     * 
     */
    public function __get($property){
     
        return $this->$property;
     
    }
    /**
     * PHP setter magic method
     * 
     */
    public function __set($property,$value){

        $this->$property=$value;
        
    }
}