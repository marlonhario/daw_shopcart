<?php session_start(); ?>
	
<?php 

	if (empty($_SESSION['macart'])) {
		$_SESSION['macart'] = array();
	}
	if (empty($_SESSION['container'])) {
		$_SESSION['container'] = array();
	}
	if (empty($_SESSION['users_id'])) {
		$_SESSION['users_id'] = array();

	}

	if (!empty($_GET['id'])) {
		$count_prodc = count($_SESSION['products_list_'.$_SESSION['user_id']]);

		for ($d=0; $d < $count_prodc; $d++) { 
			$get_prod_id = $_SESSION['products_list_'.$_SESSION['user_id']][$d]['id'];
			
			if ($get_prod_id === $_GET['id']) {
				if ($_SESSION['products_list_'.$_SESSION['user_id']][$d]['qty'] === 4 || $_SESSION['products_list_'.$_SESSION['user_id']][$d]['qty'] > 4) {

				} else {
					$_SESSION['products_list_'.$_SESSION['user_id']][$d]['qty'] += 1;
					unset($_SESSION['products_list_'.$_SESSION['user_id']][$d]['total']);
					$_SESSION['products_list_'.$_SESSION['user_id']][$d]['total'] = $_SESSION['products_list_'.$_SESSION['user_id']][$d]['qty'] * $_SESSION['products_list_'.$_SESSION['user_id']][$d]['price'];
				}

			}
		}

		array_push($_SESSION['macart'], $_SESSION['user_id'].'_'.$_GET['id']);
		header('location: index.php');
	}

	if (!empty($_GET['id_prod'])) {
		for ($i=0; $i < count($_SESSION['products_list_'.$_SESSION['user_id']]); $i++) { 
			if ($_SESSION['products_list_'.$_SESSION['user_id']][$i]['id'] === $_GET['id_prod']) {
				unset($_SESSION['products_list_'.$_SESSION['user_id']][$i]['qty']);
				$_SESSION['products_list_'.$_SESSION['user_id']][$i]['qty'] = 0;
			}
		}
	}

	if (!empty($_GET['id_up'])) {
		$varray = array();
		array_push($varray, $_GET['id_up']);
		echo json_encode($varray);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>