<?php 
require_once 'db.php';
class Base_model{
	public $db;
	public function __construct(){
		$this->db = new db('localhost', 'root', '', 'project');
	}
}