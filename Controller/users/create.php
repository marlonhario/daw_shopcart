<?php 
	session_start();

	include_once '../../Config/Database.php';
	include_once '../../Model/Users.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$user = new Users($db); 

	$first_name = htmlspecialchars($_POST['signup_first_name']);
	$last_name = htmlspecialchars($_POST['signup_last_name']);
	$email = htmlspecialchars($_POST['signup_email']);
	$username = htmlspecialchars($_POST['signup_username']);
	$password = htmlspecialchars($_POST['signup_password']);
	$password_confirmation = htmlspecialchars($_POST['signup_password_confirmation']);

	if ($password_confirmation === $password) {
		if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($username) && !empty($password)) {
			$user->first_name = $_POST['signup_first_name'];
			$user->last_name = $_POST['signup_last_name'];
			$user->email = $_POST['signup_email'];
			$user->username = $_POST['signup_username'];
			$user->password = password_hash($password, PASSWORD_BCRYPT);

			//Create user
			if ($user->create()) {

				// $user->read_single();
				// $_SESSION['user_id'] = $user->id;
				// $_SESSION['first_name'] = $user->first_name;
				// $_SESSION['last_name'] = $user->last_name;
				// $_SESSION['email'] = $user->email;
				// $_SESSION['username'] = $user->username;

				echo json_encode(
					array('message' => 1)
				);
			} else {
				echo json_encode(
					array('message' => 'User Not Created')
				);
			}
		} else {
			echo json_encode(
				array('message' => 'Make sure to fill all fields')
			);
		}
	} else {
		echo json_encode(
			array('message' => 'Password confirmation mismatch')
		);
	}
	
	


	