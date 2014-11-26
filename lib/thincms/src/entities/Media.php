<?php
namespace lib\thincms\src\entities;

class Media{
	
	private $media_id;
	private $media_name;
	private $media_type;
	private $media_link;

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
