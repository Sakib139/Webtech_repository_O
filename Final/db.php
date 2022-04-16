<?php
class db{
	private $conn;

	public function __construct($host, $username, $password, $db){
		$this->conn = new mysqli($host, $username, $password, $db);
	}

	public function insert($table, $set){
		$col = "(";
		$val = "(";
		foreach ($set as $key => $value) {
			$col .= "`".$key."`,";
			$val .= "'".$value."',";
		}
		$col = substr($col, 0, -1);
		$val = substr($val, 0, -1);
		$col .= ")";
		$val .= ")";

		$sql = htmlentities("INSERT INTO `{$table}` {$col} VALUES {$val}");
		
		if($this->conn->query($sql)){
			if($this->conn->insert_id > 0){
				return $this->conn->insert_id;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function update($table, $set, $cond){
		$setQ = "";
		foreach ($set as $key => $value) {
			$setQ .= "`{$key}` = '{$value}',";
		}
		$setQ = substr($setQ, 0, -1);

		$sql = htmlentities("UPDATE `{$table}` SET {$setQ} WHERE {$cond}");
		
		if($this->conn->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function delete($table, $cond){
		$sql = htmlentities("DELETE FROM `{$table}` WHERE $cond");

		if($this->conn->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function get($table, $select = "*", $cond = null, $limit = null, $offset = 0, $order_by = null, $join = null, $jtype = "LEFT", $refCol = "", $searchCol = "id"){
		$sql = "SELECT {$select} FROM `{$table}`";

		if($join !== null){
			$sql .= "{$jtype} JOIN `{$join}` ON `{$table}`.`{$refCol}` = `{$join}`.`{$searchCol}` ";
		}

		if($cond !== null){
			$sql .= "WHERE {$cond} ";
		}

		if($order_by !== null){
			$sql .= "ORDER BY {$order_by} ";
		}

		if($limit !== null){
			$sql .= "LIMIT {$limit} OFFSET {$offset} ";
		}
		
		if($result = $this->conn->query($sql)){
			if($result->num_rows > 0){
				$data = [];
				while ($row = $result->fetch_assoc()){
					$data[] = $row;
				}
				return $data;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function __destruct(){
		$this->conn->close();
	}
}

// $db = new db('localhost', 'root', '', 'blog');
// $set = [
// 	'first_name' => 'Nasif',
// 	'last_name' => 'Ahmed',
// ];
// $id = $db->get('posts', "`posts`.`id` as `id`, `posts`.`user_id` as `user_id`, `posts`.`title` as `title`, `posts`.`description` as `description`, `users`.`first_name` as `first_name`, `users`.`last_name` as `last_name`, `posts`.`created_at` as `created_at`", null, null, 0, "`id` DESC", "users", "LEFT", "user_id");
// echo "<pre>";
// var_dump($id);