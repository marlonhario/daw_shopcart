<?php 
session_start();

if (!empty($_GET['id_up'])) {
	echo json_encode($_GET['id_up']);
}
	$var = $_GET['id_up'];
echo json_encode(
			array('message' => $var)
		);	
?>