<?php 

namespace App\Controllers;


class HomeController extends BaseController
{
	public function index()
	{
		$this->message = "Selamat Datang!";
		return $this->message;
	}

}