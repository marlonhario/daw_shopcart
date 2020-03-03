<div class="display_none jumbotron p-3 m-0" id="container_cart">
  <div class="row">
  	<div class="col-md-12">
  		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">QTY</th>
		      <th scope="col">Product Name</th>
		      <th scope="col">Price</th>
		      <th scope="col">Total</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody id="tbody_cart">
		  	<?php
		  	if (!empty($_SESSION['macart'])) {
		  		$arr_count = array_count_values($_SESSION['macart']);
		  		$arr_unq = array_unique($arr_count);
			  	$new_arr = array();
			  	$counter = 0;

	  			
		  		// for ($i=0; $i < count($_SESSION['macart']); $i++) {
			  	// 	$find_prod = strpos($_SESSION['macart'][$i], $_SESSION['user_id'].'_');

			  	// 	if (is_numeric($find_prod)) { 
			  	// 		array_push($new_arr, $_SESSION['macart'][$i]);
			  	// 		$counter++;
			  	// 	}
			  		
		  		// }
		  		// $new_arr_cnt = array_count_values($new_arr);
		  	

		  		// // echo $_SESSION['products_list_'.$_SESSION['user_id']][3]['qty'];
		  		// if (!empty($_SESSION['products_list_'.$_SESSION['user_id']])) {
			  	// 	$p_lis_cnt = count($_SESSION['products_list_'.$_SESSION['user_id']]);

			  	// 	for ($c=0; $c < $p_lis_cnt; $c++) {

			  	// 		if ($_SESSION['products_list_'.$_SESSION['user_id']][$c]['qty'] !== '0') {
			  	// 		 	echo '<tr class="table-dark" id="cart_list">'.
						//      '<th scope="row" id="cart_qty">'.$_SESSION['products_list_'.$_SESSION['user_id']][$c]['qty'].'</th>'.
						//       '<td id="cart_name">'.
						      	
						//       	$_SESSION['products_list_'.$_SESSION['user_id']][$c]['product_name']
						//       .'</td>'.
						//       '<td id="cart_price">'.
						//       	$_SESSION['products_list_'.$_SESSION['user_id']][$c]['price']
						//       .'</td>'.
						//       '<td id="cart_price">'.
						//       	$_SESSION['products_list_'.$_SESSION['user_id']][$c]['total']
						//       .'</td>'.
						//     '</tr>';
			  	// 		 } 
			  	// 	}
			  	// }	

		  		if (empty($_SESSION['products_list_'.$_SESSION['user_id']])) { ?>
		  			<tr class="table-dark">
				      <th scope="row">None</th>
				      <td>None</td>
				      <td>None</td>
				      <td>None</td>
				      <td>None</td>
				    </tr>
		  		<?php }
		  	 
		  	 } else { ?>
				<tr class="table-dark">
			      <th scope="row">None</th>
			      <td>None</td>
			      <td>None</td>
			      <td>None</td>
			      <td>None</td>
			    </tr>
		  	<?php } ?>
		    
		  </tbody>
		</table> 
  	</div>
  </div>

  <div class="row mb-3">
  	<div class="col-md-6" id="btn_check">
		<a href="#myModal" id="trigger_mod" class="check_out_btn trigger-btn tn btn-primary btn-lg w-50 text-center" data-toggle="modal" role="button">Check out</a>
		<a href="index.php" id="trigger_mod" class="trigger-btn tn btn-success btn-lg ml-3 w-50 text-center" role="button">Continue Shopping</a>
	</div>
	<div class="form-group col-md-3 ml-auto" id="select_ship">
      <label for="exampleSelect1">Select Shipping Fee :</label>
      <select class="form-control" id="shipp_embed">
      </select>
    </div>
  	
  </div>
  <div class="row">
  	<div class="col-md-5 ml-auto">
		<h3 id="sum_price" class="text-right"></h3>
	</div>	
  </div>
  <div class="row lead">
	
	<!-- Modal HTML -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header">
					<div class="icon-box">
						<i class="material-icons">&#9989;</i>
					</div>				
					<h4 class="modal-title">Thank You!</h4>	
				</div>
				<div class="modal-body">
					<p class="text-center">Your products will be delivered soon.</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success btn-block reload_btn" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>  
	
  </div>


  <div class="row mt-5">
  	<div class="col-md-12" id="checkout_wrapper"></div>
  </div>
</div>
