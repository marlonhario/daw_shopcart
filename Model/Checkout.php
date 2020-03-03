<?php 
	class Checkout {
		//DB stuff
		private $conn;
		private $table = 'user_cart';

		//Product Properties
		public $id;
		public $product_id;
		public $user_id;
		public $product_quantity;
		public $shipping_name;
		public $total_pay;
		public $created_at;

		//Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		//Create Ckeckout
		public function create() {
			//Create query
			$query = 'INSERT INTO '.
					$this->table .'
				SET
					product_id = :product_id,
					user_id = :user_id,
					product_quantity = :product_quantity,
					shipping_name = :shipping_name,
					total_pay = :total_pay';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->product_id = htmlspecialchars(strip_tags($this->product_id));	
			$this->user_id = htmlspecialchars(strip_tags($this->user_id));	
			$this->product_quantity = htmlspecialchars(strip_tags($this->product_quantity));	
			$this->shipping_name = htmlspecialchars(strip_tags($this->shipping_name));
			$this->total_pay = htmlspecialchars(strip_tags($this->total_pay));

			//Bind data
			$stmt->bindParam(':product_id', $this->product_id);	
			$stmt->bindParam(':user_id', $this->user_id);	
			$stmt->bindParam(':product_quantity', $this->product_quantity);	
			$stmt->bindParam(':shipping_name', $this->shipping_name);	
			$stmt->bindParam(':total_pay', $this->total_pay);	
		
			//Execute query
			if ($stmt->execute()) {
				return true;
			}
			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}


		//read chekouts
		public function read() {
			//Create query
			
			$query = 'SELECT u.user_id, O.product_name, O.price, u.product_quantity,
				       	u.total_pay, u.created_at
					FROM products O   
					JOIN user_cart u ON O.id = u.product_id
					WHERE 
				  		u.user_id = :id
					ORDER BY u.created_at';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Bind data
			$stmt->bindParam(':id', $this->user_id);	

			//Execute query
			$stmt->execute();

			return $stmt;
		}
		
		
	}
?>