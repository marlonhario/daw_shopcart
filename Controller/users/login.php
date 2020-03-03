<?php 

	session_start();

	include_once '../../Config/Database.php';
	include_once '../../Model/Users.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog user object
	$user = new Users($db); 

	$username_log = htmlspecialchars($_POST['login_username']);
	$password_log = $_POST['login_password'];
	
	$user->username = $username_log;
	
	// if (!empty($username_log) && !empty($password_log)) {
		
		

	// 	// Get user
		$user->read_single();
		//Create array

		$post_arr = array(
			'id' => $user->id,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'email' => $user->email,
			'username' => $user->username,
			'password' => $user->password,
		);
		if (!empty($username_log) && !empty($password_log)) {
			$check_pass = password_verify($password_log, $user->password);

			if ($user->username !== null && $check_pass === true) {
				$_SESSION['user_id'] = $user->id;
				$_SESSION['first_name'] = $user->first_name;
				$_SESSION['last_name'] = $user->last_name;
				$_SESSION['email'] = $user->email;
				$_SESSION['username'] = $user->username;
				$_SESSION['password'] = $user->password;

				echo json_encode(1);
			} else {
				echo json_encode('wrong password');
			}
		} else {
			echo json_encode('Make sure to fill all fields!.');
		}
		
		
		// if ($check_pass) {
		// 	header('location:../../');
		// 	echo json_encode('check password');
		// } else {
		// 	echo json_encode('wrong password');
		// }
		
		
	
		

