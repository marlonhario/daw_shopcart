<?php 
	session_start();
	include_once '../../Config/Database.php';
	include_once '../../Model/Checkout.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog checkout object
	$checkout = new Checkout($db); 
	$product = new Products($db); 

	$wrap_arr = $_SESSION['products_list_'.$_SESSION['user_id']];
	// $l = 0;

	

	for ($l=0; $l < count($wrap_arr); $l++) { 
		if (intval($wrap_arr[$l]['qty']) > 0 ) {
			$product_id = htmlspecialchars($wrap_arr[$l]['id']);
			$user_id = htmlspecialchars($_SESSION['user_id']);
			$product_quantity = htmlspecialchars($wrap_arr[$l]['qty']);
			$shipping_name = htmlspecialchars($_POST['shipping_fee']);
			$total_pay = htmlspecialchars($_POST['total_sum']);
	 
			$checkout->product_id = $wrap_arr[$l]['id'];
			$checkout->user_id = $_SESSION['user_id'];
			$checkout->product_quantity = $wrap_arr[$l]['qty'];
			$checkout->shipping_name = $_POST['shipping_fee'];
			$checkout->total_pay = $_POST['total_sum'];

			//Get ID
			$product->id =  $wrap_arr[$l]['id'];

			//Get product
			$product->read_single();
			$product->remaining;


			$product->remaining = ($product->remaining - $wrap_arr[$l]['qty']);

			//Update product
			if ($product->update()) {
				echo json_encode(
					array('message' => 'Post Updated')
				);	
			} else {
				echo json_encode(
					array('message' => 'Post Not Updated')
				);
			}

			$_SESSION['products_list_'.$_SESSION['user_id']][$l][qty] = 0;

			if ($checkout->create()) {

				echo json_encode(
					array('message' => 'createadddddddd')
				);
			} else {
				echo json_encode(
					array('message' => ' Not Created')
				);
			}
		}
	}
	echo json_encode(
				array('message' => 'Not Created')
			);
// echo json_encode(
// 				array('message' => $wrap_arr[$l]['id'])
// 			);
	
	// $product_car = array();
	// array_push($product_car, $_SESSION['products_list_'.$_SESSION['user_id']]);
	// echo json_encode(
	// 		array('message' => $product_car)
	// 	);
	

?>