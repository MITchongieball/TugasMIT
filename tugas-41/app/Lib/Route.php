<?php 
namespace App\Lib;

class Route
{
	private $url;
	private $controller;
	private $action;
	private $namespace = "App\\Controllers\\";
	private $error;
	
	public function __construct($url)
	{
		if (!empty($_GET)) {
			$this->url = $_GET;
		}

		//if error return to Error Controller
		$this->error = $this->namespace. 'ErrorController';

		//check if $_GET['page'] is isset
		if (isset($this->url['page'])) {
			$this->controller = $this->namespace. ucfirst($this->url['page'])."Controller";
		} elseif (!isset($this->url)) {
			$this->controller = $this->namespace. 'HomeController';
		} else {
			$this->controller = $this->error;
		}

		//check if $_GET['page']['action'] is isset
		if (isset($this->url['action'])) {
			$this->action = $this->url['action'];
		} else {
			$this->action = 'index';
		}
	}

	//autoload Controller
	public function createController()
	{
		//check if class exists
		if (class_exists($this->controller)) {
			$parent = class_parents($this->controller);

			//check if controller is child from BaseController
			if (in_array($this->namespace. 'BaseController', $parent)) {

				//check if method is exists
				if (method_exists($this->controller, $this->action)) {
					return new $this->controller($this->url, $this->action);
				} else {
					echo "Method Not Found";
				}
			} else {
				echo "BaseController Not Found";
			}
		} else {
			echo "Class Not Found";
		}
	}

}