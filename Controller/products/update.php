<?php 

	include_once '../../Config/Database.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$product = new Products($db); 

	//Set ID tp update
	$product->id = 2;

	$product->product_name = 'Updated';
	$product->product_description = 'Updated';
	$product->price = 'Updated';
	$product->remaining = 'Updated';

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