<?php 

	include_once '../../Config/Database.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$product = new Products($db); 

	$product->product_name = 'Sample inserted';
	$product->product_description = 'Sample inserted';
	$product->price = 'Sample inserted';
	$product->remaining = 'Sample inserted';

	//Create product
	if ($product->create()) {
		echo json_encode(
			array('message' => 'Post Created')
		);	
	} else {
		echo json_encode(
			array('message' => 'Post Not Created')
		);
	}