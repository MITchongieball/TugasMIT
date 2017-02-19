<?php 

namespace App\Controllers;

class BookController extends BaseController
{
	public function index()
	{
		return $this->model->showAll();
	}

}