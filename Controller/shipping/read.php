<?php 
	session_start();
	include_once '../../Config/Database.php';
	include_once '../../Model/Shipping.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog shipping object
	$shipping = new Shipping($db);

	//Blog shipping query 
	$result_ship = $shipping->read();
	//Get row count
	$num_ship = $result_ship->rowCount();

	//Check if any Shipping 
	if ($num_ship > 0) {
		//Post array
		$shipping_arr = array();
		$shipping_arr['data'] = array();
	

			while ($row = $result_ship->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				$shipping_item = array(
					'id' => $id,
					'shipping_name' => $shipping_name,
					'amount' => $amount
				);
				//Push tp "data"
				array_push($shipping_arr['data'], $shipping_item);
			}
		// Turn to JSON & output
		echo json_encode($shipping_arr);
	} else {
		//No Shipping 
		echo json_encode(
			array('messsage' => 'No Shipping Found')
		);
	}
	// echo json_encode(
	// 		array('messsage' => $num_ship)
	// 	);
?>