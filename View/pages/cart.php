<div class="display_none jumbotron p-3 m-0" id="container_cart">
	<a class="navbar-brand" href="index.php"><strong>HOME</strong></a>
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
  <table class="table" style="background: white;">
    <thead>
      <tr>
        <th colspan="6" style="background: black; font-size: 21px; text-align: center;">Transaction History</th>
      </tr>
      <tr>
        <th>Date</th>
        <th>Product name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Shipping fee</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody id="transaction_history">
     <!--  <tr>
        <td>John</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>mary@example.com</td>
        <td>mary@example.com</td>
      </tr> -->
    </tbody>
  </table>  
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
