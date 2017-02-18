<?php 

namespace App\Controllers;


class BookController extends BaseController
{
	public function index($param = '')
	{
		return $this->model->showAll();
	}

}