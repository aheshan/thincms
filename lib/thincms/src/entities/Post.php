<?php
namespace lib\thincms\src\entities;

/**
 * post class
 */
class Post {
	
	private $post_id;
	private $post_title;
	private $post_description;
    private $post_date;
    priavet $allow_comments;
	private $post_categories;

	public function __construct(){
		$this->post_categories = array();
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