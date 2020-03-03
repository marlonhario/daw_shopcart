<?php 
	class Products {
		//DB stuff
		private $conn;
		private $table = 'products';

		//Product Properties
		public $id;
		public $product_name;
		public $product_description;
		public $price;
		public $img;
		public $remaing;
		public $created_at;

		//Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		//Get Single Product
		public function read_single() {
			//Create query
			$query = 'SELECT
						id,
						product_name,
						product_description,
						price,
						remaining,
						created_at
					FROM 
						'.$this->table.' 
					WHERE
						id =?
					LIMIT 0, 1';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Bind ID		
			$stmt->bindParam(1, $this->id);

			//Execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//Set properties
			$this->product_name = $row['product_name'];
			$this->product_description = $row['product_description'];
			$this->price = $row['price'];
			$this->remaining = $row['remaining'];
			$this->created_at = $row['created_at'];
		}

		//Get Products
		public function read() {
			//Create query
			$query = 'SELECT
						id,
						product_name,
						product_description,
						price,
						remaining,
						img,
						created_at
					FROM 
						'.$this->table.'
					ORDER BY
						created_at DESC';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Execute query
			$stmt->execute();

			return $stmt;
		}

		//Create Product
		public function create() {
			//Create query
			$query = 'INSERT INTO '.
					$this->table .'
				SET
					product_name = :product_name,
					product_description = :product_description,
					price = :price,
					remaining = :remaining';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->product_name = htmlspecialchars(strip_tags($this->product_name));	
			$this->product_description = htmlspecialchars(strip_tags($this->product_description));	
			$this->price = htmlspecialchars(strip_tags($this->price));	
			$this->remaining = htmlspecialchars(strip_tags($this->remaining));

			//Bind data
			$stmt->bindParam(':product_name', $this->product_name);	
			$stmt->bindParam(':product_description', $this->product_description);	
			$stmt->bindParam(':price', $this->price);	
			$stmt->bindParam(':remaining', $this->remaining);	
		
			//Execute query
			if ($stmt->execute()) {
				return true;
			}

			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}

		//Add cart
		public function addcart() {
			//Create query
			$query = 'INSERT INTO '.
					$this->table .'
				SET
					product_id = :product_id,
					user_id = :user_id,
					quantity = :quantity';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->product_name = htmlspecialchars(strip_tags($this->product_name));	
			$this->product_description = htmlspecialchars(strip_tags($this->product_description));	
			$this->price = htmlspecialchars(strip_tags($this->price));	
			$this->remaining = htmlspecialchars(strip_tags($this->remaining));

			//Bind data
			$stmt->bindParam(':product_name', $this->product_name);	
			$stmt->bindParam(':product_description', $this->product_description);	
			$stmt->bindParam(':price', $this->price);	
			$stmt->bindParam(':remaining', $this->remaining);	
		
			//Execute query
			if ($stmt->execute()) {
				return true;
			}

			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}

		//Update Product
		public function update() {
			//Create query
			$query = 'UPDATE '.
					$this->table .'
				SET
					product_name = :product_name,
					product_description = :product_description,
					price = :price,
					remaining = :remaining
				WHERE
					id = :id';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->product_name = htmlspecialchars(strip_tags($this->product_name));	
			$this->product_description = htmlspecialchars(strip_tags($this->product_description));	
			$this->price = htmlspecialchars(strip_tags($this->price));	
			$this->remaining = htmlspecialchars(strip_tags($this->remaining));
			$this->id = htmlspecialchars(strip_tags($this->id));

			//Bind data
			$stmt->bindParam(':product_name', $this->product_name);	
			$stmt->bindParam(':product_description', $this->product_description);	
			$stmt->bindParam(':price', $this->price);	
			$stmt->bindParam(':remaining', $this->remaining);	
			$stmt->bindParam(':id', $this->id);	
		
			//Execute query
			if ($stmt->execute()) {
				return true;
			}

			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}

		//Delete Post
		public function delete() {
			//Create query
			$query = 'DELETE FROM '.$this->table.' WHERE id = :id';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->id = htmlspecialchars(strip_tags($this->id));

			//Bind data
			$stmt->bindParam(':id', $this->id);

			//Execute query
			if ($stmt->execute()) {
				return true;
			}

			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}
	}
?>