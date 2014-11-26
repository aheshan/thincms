<?php
namespace lib\thincms\src\services;

class DBManager{
	private $pdo; 
	

	public function __construct(){
	
		$this->pdo = new PDO(
		    'mysql:host=localhost;dbname=test',
		    'root',
		    'root'
		);
	}
	public static function getInstance()
    {
		static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }
	public function getPDO(){
		return $this->pdo;
	}
}