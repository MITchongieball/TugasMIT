<?php 

namespace App\Controllers;


class CategoryController extends BaseController
{
	public function index($param = '')
	{
		return $this->model->showAll();
	}

}