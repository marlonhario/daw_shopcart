<?php 
	class Shipping {
		//DB stuff
		private $conn;
		private $table = 'shipping_fee';

		//Product Properties
		public $id;
		public $shipping_name;
		public $amount;

		//Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		//Get Products
		public function read() {
			//Create query
			$query = 'SELECT
						id,
						shipping_name,
						amount
					FROM 
						'.$this->table.'
					ORDER BY
						id DESC';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Execute query
			$stmt->execute();

			return $stmt;
		}

		
	}
?>