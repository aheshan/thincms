<?php
namespace lib\database;

/**
 * Provides decorated methods for database operation
 * @author ahesan
 *
 */
class DBUtils{
	private $database = null;
	private $results = null;
	/**
	 * constructor
	 */
	public function __construct(){
		$this->database = Database::getInstance();	
	}
	public function getDatabase(){
		return $this->database;
	}
	public static function getInstance(){
		static $instance = null;
		if (null === $instance) {
			$instance = new static();
		}
		return $instance;
	}
	/** 
	 * perform database action based on paramter provided
	 * 
	 * 1. use database instance
	 * 2. do query
	 * 3. bind param
	 * 4. fire execute
	 * 5. return results if no exception 
	 *    else throw exception
	 */
	
	public function performDBAction($action,$sql,$bindParams = null){
		//preparing query
		$this->database->query($sql);

		//binding parameter
		if(!is_null($bindParams) && !empty($bindParams) ){
			foreach ($bindParams as $key => $value) {
				$this->database->bind($key,$value);
			}
		}

		//executing statement
		$this->results = $this->database->execute();
		
		switch ($action) {
			case 'get_more':
				$this->results = $this->database->resultset();
				break;
			case 'get_signle':
				 $this->results = $this->database->single();
				break;
			case 'get_count':
				$this->results = $this->database->rowCount();			
				break;
			default:
				// Declare custom class for exception
				// Thorw exception that you have not provided proper action
				break;
		}
		return $this->results;
	}
	
}