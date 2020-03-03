<?php 
	session_start();
	include_once '../../Config/Database.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$product = new Products($db);

	//Blog product query 
	$result = $product->read();

	//Fetch all transaction history
	$result_history = $product->transaction_history();
	// $result_history = $product->fetch(PDO::FETCH_ASSOC);
	

	//Get row count
	$num = $result->rowCount();
	$num_history = $result_history->rowCount();

	// print_r($num_history); die();
	//Check if any Products 
	if ($num > 0) {
		//Post array
		$products_arr = array();
		$products_arr['data'] = array();
		$_SESSION['product_id'] = array();
		$product_car = [];

		if (empty($_SESSION['products_list_'.$_SESSION['user_id']])) {
				
			$_SESSION['products_list_'.$_SESSION['user_id']] = array();
			
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				$product_user_cart = array(
					'qty' => '0',
					'total' => '0',
					'id' => $id,
					'product_name' => $product_name,
					'product_description' => html_entity_decode($product_description), 
					'price' => $price,
					'remaining' => $remaining,
					'img' => $img,
					'created_at' => $created_at
				);
				//Push tp "data"
				array_push($product_car[$id], $product_user_cart);
				array_push($_SESSION['products_list_'.$_SESSION['user_id']], $product_user_cart);
			}
		}


		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);
			$product_item = array(
				'id' => $id,
				'product_name' => $product_name,
				'product_description' => html_entity_decode($product_description), 
				'price' => $price,
				'remaining' => $remaining,
				'img' => $img,
				'created_at' => $created_at
			);
			//Push tp "data"


			array_push($_SESSION['product_id'], $id);
			 
			array_push($products_arr['data'], $product_item);
		}

		$array_trans = array();

		if ($num_history > 0) {
			while ($row = $result_history->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				$product_transactions = array(
					'id' => $id, 
				  	'product_id' => $product_id, 
				  	'user_id' => $user_id, 
				  	'product_name' => $product_name, 
				  	'price' => $price, 
				  	'product_quantity' => $product_quantity, 
				  	'shipp_price' => $shipp_price, 
				  	'shipp_name' => $shipp_name, 
				  	'total_pay' => $total_pay, 
				  	'created_at' => $created_at
				);
				//Push tp "data"
				 
				array_push($array_trans, $product_transactions);
			}
		}	
		
		
		
		array_push($products_arr['data'], $_SESSION['products_list_'.$_SESSION['user_id']]);
		array_push($products_arr['data'], $array_trans);
		//Turn to JSON & output
		echo json_encode($products_arr);
	} else {
		//No Products 
		echo json_encode(
			array('messsage' => 'No Products Found')
		);
	}
?>