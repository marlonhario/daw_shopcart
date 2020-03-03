<?php 
	class Users {
		//DB stuff
		private $conn;
		private $table = 'user';

		//Product Properties
		public $id;
		public $first_name;
		public $last_name;
		public $email;
		public $username;
		public $password;
		public $created_at;

		//Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		//Create User
		public function create() {
			//Create query
			$query = 'INSERT INTO '.
					$this->table .'
				SET
					first_name = :first_name,
					last_name = :last_name,
					email = :email,
					username = :username,
					password = :password';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->first_name = htmlspecialchars(strip_tags($this->first_name));	
			$this->last_name = htmlspecialchars(strip_tags($this->last_name));	
			$this->email = htmlspecialchars(strip_tags($this->email));	
			$this->username = htmlspecialchars(strip_tags($this->username));
			$this->password = htmlspecialchars(strip_tags($this->password));

			//Bind data
			$stmt->bindParam(':first_name', $this->first_name);	
			$stmt->bindParam(':last_name', $this->last_name);	
			$stmt->bindParam(':email', $this->email);	
			$stmt->bindParam(':username', $this->username);	
			$stmt->bindParam(':password', $this->password);	
		
			//Execute query
			if ($stmt->execute()) {
				return true;
			}

			//Print error if something goes wrong
			printf("Error: %s. \n", $stmt->error);

			return false;
		}

		

		
		//Get Single Product
		public function read_single() {
			//Create query
			$query = 'SELECT
						*
					FROM 
						'.$this->table.' 
					WHERE
						username = :username
					LIMIT 0, 1';

			//Prepare statement
			$stmt = $this->conn->prepare($query);

			//Clean data
			$this->username = htmlspecialchars(strip_tags($this->username));
		

			//Bind data
			$stmt->bindParam(':username', $this->username);	

			//Execute query
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//Set properties
			$this->id = $row['id'];
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->email = $row['email'];
			$this->username = $row['username'];
			$this->password = $row['password'];	
			
		}
	}
?>