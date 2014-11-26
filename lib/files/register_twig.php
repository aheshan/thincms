<?php

class TwigLoader{
	
	private $loader; 
	private $twig;

	public function __construct(){
		//initialize twig templates
		Twig_Autoloader::register();
		$this->loader = new Twig_Loader_Filesystem('../app/templates');
		$this->twig = new Twig_Environment($this->loader);	
	}
	public static function getInstance()
    {
		static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }
	public function getTwigObject(){
		return $this->twig;
	}
}

?>