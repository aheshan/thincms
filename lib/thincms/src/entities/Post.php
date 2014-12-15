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
	private $post_categories;

	public function __construct($post = null ){
		if(!is_null($post)){
            $this->post_id          = array_key_exists('post_id', $post) ? $post['post_id']: null;
            $this->post_title       = array_key_exists('post_title', $post) ? $post['post_title']: null;
            $this->post_description = array_key_exists('post_description', $post) ? $post['post_description']: null;
            $this->post_date        = array_key_exists('post_date', $post) ? $post['post_date']: null;
            $this->post_categories  = array_key_exists('post_categories', $post) ? $post['post_categories']: null;
        }
	}
    

    /**
     * Gets the value of post_id.
     *
     * @return mixed
     */
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * Sets the value of post_id.
     *
     * @param mixed $post_id the post_id
     *
     * @return self
     */
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

    /**
     * Gets the value of post_title.
     *
     * @return mixed
     */
    public function getPost_title()
    {
        return $this->post_title;
    }

    /**
     * Sets the value of post_title.
     *
     * @param mixed $post_title the post_title
     *
     * @return self
     */
    public function setPost_title($post_title)
    {
        $this->post_title = $post_title;

        return $this;
    }

    /**
     * Gets the value of post_description.
     *
     * @return mixed
     */
    public function getPost_description()
    {
        return $this->post_description;
    }

    /**
     * Sets the value of post_description.
     *
     * @param mixed $post_description the post_description
     *
     * @return self
     */
    public function setPost_description($post_description)
    {
        $this->post_description = $post_description;

        return $this;
    }

    /**
     * Gets the value of post_date.
     *
     * @return mixed
     */
    public function getPost_date()
    {
        return $this->post_date;
    }

    /**
     * Sets the value of post_date.
     *
     * @param mixed $post_date the post_date
     *
     * @return self
     */
    public function setPost_date($post_date)
    {
        $this->post_date = $post_date;

        return $this;
    }

    /**
     * Gets the value of post_categories.
     *
     * @return mixed
     */
    public function getPost_categories()
    {
        return $this->post_categories;
    }

    /**
     * Sets the value of post_categories.
     *
     * @param mixed $post_categories the post_categories
     *
     * @return self
     */
    public function setPost_categories($post_categories)
    {
        $this->post_categories = $post_categories;

        return $this;
    }
}