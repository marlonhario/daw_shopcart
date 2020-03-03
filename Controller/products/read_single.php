<?php 

	include_once '../../Config/Database.php';
	include_once '../../Model/Products.php';

	//Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	//Instantiate blog product object
	$product = new Products($db);

	//Get ID
	$product->id = isset($_GET['id']) ? $_GET['id'] : die();

	//Get product
	$product->read_single();

	//Create array
	$post_arr = array(
		'id' => $product->id,
		'title' => $product->product_name,
		'body' => $product->product_description,
		'author' => $product->price,
		'category_id' => $product->remaining,
		'category_name' => $product->created_at,
	);

	//Make JSON
	print_r(json_encode($post_arr));