<?php 

namespace App\Controllers;

abstract class BaseController
{
	protected $url;
	protected $action;
	protected $model;
	protected $namespace = "App\\Models\\"; //for autoload models
	public $message;

	public function __construct($url, $action)
	{
		$this->url = $url['page'];
		$this->action = $action;

		if (isset($this->url)) {
			$model = $this->namespace. ucfirst($url['page']);
			$this->model = new $model;
		} 
	}

	public function executeAction()
	{
		if(!empty($this->action)) {
			return $this->{$this->action}();
		} else {
			$this->message = "Action Not Found";
			echo "$this->message";
		}
	}

	public function executeView($viewName)
	{
		if (!isset($this->url)) {
			$this->url = 'Home';
			$viewName = 'index';
		} else {
			$viewName = $this->action;
		}

		$viewFile = "app/Views/".ucfirst($this->url)."/$viewName.php";
		if (file_exists($viewFile)) {
			require_once($viewFile);
		} else {
			$this->message = "File Not Found";
			echo "$this->message";
		}
	}
}