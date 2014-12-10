<?php
namespace lib\thincms\src\entities;

/**
 * category class
 */
class Category {
	
	private $category_id;
	private $caregory_name;
	private $parent_cat_id;

	public function __construct( $category = null ){
        if(!is_null($category)){
            $this->category_id = array_key_exists('category_id', $category) ? $category['category_id']: null;
            $this->caregory_name = array_key_exists('category_name', $category) ? $category['category_name']: null;
            $this->parent_cat_id = array_key_exists('parent_id', $category) ? $category['parent_id']: null;
        }
    } 

    
    /**
     * converting object to array
     */
    public function toArray(){
        $var = get_object_vars($this);
        foreach($var as &$value){
           if(is_object($value) && method_exists($value,'getJsonData')){
              $value = $value->getJsonData();
           }
        }
        return $var;
     }

    /**
     * Gets the value of category_id.
     *
     * @return mixed
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Sets the value of category_id.
     *
     * @param mixed $category_id the category_id
     *
     * @return self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Gets the value of caregory_name.
     *
     * @return mixed
     */
    public function getCaregory_name()
    {
        return $this->caregory_name;
    }

    /**
     * Sets the value of caregory_name.
     *
     * @param mixed $caregory_name the caregory_name
     *
     * @return self
     */
    public function setCaregory_name($caregory_name)
    {
        $this->caregory_name = $caregory_name;

        return $this;
    }

    /**
     * Gets the value of parent_cat_id.
     *
     * @return mixed
     */
    public function getParent_cat_id()
    {
        return $this->parent_cat_id;
    }

    /**
     * Sets the value of parent_cat_id.
     *
     * @param mixed $parent_cat_id the parent_cat_id
     *
     * @return self
     */
    public function setParent_cat_id($parent_cat_id)
    {
        $this->parent_cat_id = $parent_cat_id;

        return $this;
    }
}