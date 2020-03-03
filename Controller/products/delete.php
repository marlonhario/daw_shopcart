<?php 

	include_once '../../Config/Database.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$product = new Products($db); 

	//Set ID tp delete
	$product->id = 1;

	//Update product
	if ($product->delete()) {
		echo json_encode(
			array('message' => 'Product Deleted')
		);	
	} else {
		echo json_encode(
			array('message' => 'Product Not Deleted')
		);
	}