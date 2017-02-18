<?php 

namespace App\Models;

use App\Lib\Connect;

abstract class BaseModel
{
	protected $db;

	public function __construct()
	{
		$this->db = new Connect;
	}
}