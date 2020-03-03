
<?php include 'View/include/header.php' ?>
	<!-- navbar section ====================================================== -->
	
	<?php include 'View/include/navbar.php' ?>

	<div class="container mt-5">
		<?php include 'View/pages/cart.php' ?>
	</div>
	<div class="container mt-4" id="content_container">
		<?php if(isset($_SESSION['user_id'])): ?>
			<?php include 'View/pages/product_list.php' ?>
		<?php endif; ?>
		<?php if( !isset($_SESSION['user_id'])): ?>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#home">Login</a>
			  </li>
		  		<li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#profile">Signup </a>
				</li>
			
			</ul>
			<div class="row" id="log_err">
			  <div class="col-md-12 text-align text-center">
			    <h5 class="display_log_err text-warning">Error!</h5>
			  </div>
			</div> 
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane fade show active pt-3" id="home">
			    <?php include 'View/pages/login.php' ?>
			  </div>
			  <div class="tab-pane fade" id="profile">
			    <?php include 'View/pages/signup.php' ?>
			  </div>
			</div>
		<?php endif; ?>
		 
	</div>
<!-- login page ======================================== -->
<?php include 'View/include/footer.php' ?>
	

