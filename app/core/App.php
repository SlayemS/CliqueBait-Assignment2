<?php
namespace app\core;

class App{
	//default controller and method
	private $controller = 'Main';
	private $method = 'index';

	function __construct(){
		//this is where we want to route the requests to the appropriate classes/methods
		// we wish to route requests to /controller/method
		$request = $this->parseUrl($_GET['url'] ?? '');
		//var_dump($request);

		//is the requested controller in our controllers folder?
		if(file_exists('app/controllers/' . $request[0] . '.php'))
		{
			$this->controller = $request[0];
			//$this->controller = new Main();
			//remove the $request[0] element
			unset($request[0]);
		}

		$this->controller = 'app\\controllers\\' . $this->controller;
		$this->controller = new $this->controller;

		if(isset($request[1]) && method_exists($this->controller, $request[1])){
			$this->method = $request[1];
			//remove the $request[1] element
			unset($request[1]);
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

		$params = array_values($request);

		//Call the controller method with parameters
		call_user_func_array([$this->controller, $this->method], $params);
	}

	function parseUrl($url){
		return explode('/', trim($url, '/'));
	}


}