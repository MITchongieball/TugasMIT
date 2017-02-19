<?php 

namespace App\Controllers;


class CategoryController extends BaseController
{
	public function index()
	{
		return $this->model->showAll();
	}

}