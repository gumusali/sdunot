<?php
	class sql{
		private $query, $pdo, $data;

		# construct
		public function __construct(){
			# include
			include_once($_SERVER['DOCUMENT_ROOT']. '/app/system/dsn.php');

			try{
				$this->pdo = new PDO("mysql:host={$_dsn['host']};dbname={$_dsn['db']}", $_dsn['user'], $_dsn['pass']);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo "Couldn't connect to db";
			}

			# settings
			self::set_charset();
			self::settings();
		}

		# settings
		public function settings(){
			$query = $this->pdo->prepare("SELECT * FROM settings");
			$query->execute();
			$config = $query->fetchAll(PDO::FETCH_ASSOC);

			foreach($config as $c){
				define($c['setting'], $c['value']);
			}
		}

		# select
		public function s($columns, $from){
			$this->query = "SELECT {$columns} FROM {$from}";
			$this->data  = true;

			return $this;
		}

		# update
		public function u($table, $set){
			$this->query = "UPDATE {$table} SET {$set}";
			$this->data  = false;

			return $this;
		}

		# delete
		public function d($from){
			$this->query = "DELETE FROM {$from}";
			$this->data  = false;

			return $this;
		}

		# insert
		public function i($into, $columns, $values, $multiple = false){
			$this->query = ($multiple) ? "INSERT INTO {$into}({$columns}) VALUES {$values}" : "INSERT INTO {$into}({$columns}) VALUES({$values})";
			$this->data  = false;

			return $this;
		}

		# where
		public function w($condition){
			$this->query .= " WHERE {$condition}";

			return $this;
		}

		# order
		public function o($order = null){
			if($order != null)
				$this->query .= " ORDER BY {$order}";
			
			return $this;
		}

		# limit
		public function l($limit = 1){
			$this->query .= " LIMIT {$limit}";

			return $this;
		}

		# like
		public function lk($like){
			$this->query .= " LIKE '{$like}'";

			return $this;
		}

		# group by
		public function g($group){
			$this->query .= " GROUP BY {$group}";

			return $this;
		}

		# between
		public function b($begin, $end){
			$this->query .= " BETWEEN {$begin} AND {$end}";

			return $this;
		}

		# on
		public function on($on){
			$this->query .= " ON {$on}";

			return $this;
		}

		# join
		public function j($table, $type = 'INNER'){
			$this->query .= " {$type} JOIN {$table}";

			return $this;
		}

		# free
		public function f($free, $is_data = true){
			$this->query = $free;
			$this->data  = $is_data;

			return $this;
		}

		# add
		public function a($add){
			$this->query .= " {$add}";

			return $this;
		}

		# set character set
		public function set_charset($names = 'utf8'){
			$this->F("SET CHARACTER SET '{$names}'", false)->R();
		}

		# execute query
		public function r($count = false){
			$execute = $this->pdo->prepare($this->query);
			$execute->execute();

			if($execute != true){
				return array("status"=> "error");
			}

			if($count == true)
				return $execute->rowCount();

			if($this->data == false){
				return array("status"=> "ok", "insert_id"=> $this->pdo->lastInsertId(), "affected_rows"=> $execute->rowCount());
			}else{
				$result = array();

				# create result array
				while($row = $execute->fetch(PDO::FETCH_ASSOC))
					$result[] = $row;

				# return result
				return $result;
			}			
		}


		# print query
		public function print_query(){
			echo $this->query;
		}
	}
?>