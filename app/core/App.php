<?php
namespace app\core;

class App{
	//default controller and method
	private $controller = 'Main';
	private $method = 'index';

	public function __construct(){
		//this is where we want to route the requests to the appropriate classes/methods
		// we wish to route requests to /controller/method

		$url = $this->parseUrl($_GET['url'] ?? '');
		
		//use the first part to determine the controller class to load
		//is the requested controller in our controllers folder?
		if(isset($url[0])){
			if(file_exists('app/controllers/' . $url[0] . '.php')){
				$this->controller = $url[0]; //$this refers to the current object
			}
			unset($url[0]);
		}
		$this->controller = 'app\\controllers\\' . $this->controller; //provide a fully qualified classname
		$this->controller = new $this->controller;

		//use the second part to determine the method to run

		if(isset($url[1]) && method_exists($this->controller, $url[1])){
			$this->method = $url[1];
			//remove the $url[1] element
			unset($url[1]);
		}

		//access filtering
		//attribute discovery
		$reflection = new \ReflectionObject($this->controller);

		$classAttributes = $reflection->getAttributes();
		$methodAttributes = $reflection->getMethod($this->method)->getAttributes();

		$attributes = array_values(array_merge($classAttributes, $methodAttributes));

		//running the attribute class methods
		foreach ($attributes as $attribute) {
			$filter = $attribute->newInstance();//making the object of class, e.g., Login
			if($filter->execute())
				return;
		}

		//while passing all other parts as arguments
		//repackage the parameters
		$params = $url ? array_values($url) : [];
		call_user_func_array([ $this->controller, $this->method ], $params);
	}

	public static function parseUrl(){
		if(isset($_GET['url'])){//get url exists
			return explode('/', //return parts in an array, separated by /
				filter_var(	//remove non-URL characters and sequences
					rtrim($_GET['url'], '/'))
				,FILTER_SANITIZE_URL);
		}
	}
}