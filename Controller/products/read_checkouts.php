<?php 
	session_start();
	include_once '../../Config/Database.php';
	include_once '../../Model/Checkout.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog checkout object
	$checkout = new Checkout($db);

	$checkout->user_id = $_SESSION['user_id'];
	//Blog checkout query 
	$result_cheks = $checkout->read();
	//Get row count
	$num_cheks = $result_cheks->rowCount();

	//Check if any checkout 
	if ($num_cheks > 0) {
		//Post array
		$checks_arr = array();
		$checks_arr['data'] = array();
	

			// while ($row = $result_cheks->fetch(PDO::FETCH_ASSOC)) {
			// 	extract($row);
			// 	$shipping_checks = array(
			// 		'id' => $id,
			// 		'shipping_name' => $shipping_name,
			// 		'amount' => $amount
			// 	);
			// 	//Push tp "data"
			// 	array_push($checks_arr['data'], $shipping_checks);
			// }
		// Turn to JSON & output
		// echo json_encode($checks_arr);
		echo json_encode($row = $result_cheks->fetch(PDO::FETCH_ASSOC));
	} else {
		//No Shipping 
		echo json_encode(
			array('messsage' => 'No Shipping Found')
		);
	}
	// echo json_encode(
	// 		array('messsage' => $num_cheks)
	// 	);
?>