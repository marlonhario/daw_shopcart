<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php"><small>LO</small><strong>GO</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="#" class="btn btn-secondary my-2 my-sm-0 d-flex" id="my_cart" style="align-items: inherit;" type="submit"><i style="font-size:24px, color: white;" class="fa mr-2">&#xf07a;</i> My Cart <h5 class="m-0"><span class="product_badge badge badge-light ml-2">
        <?php if (!empty($_SESSION['products_list_'.$_SESSION['user_id']])) {
          $counter = 0;
          
          for ($i=0; $i < count($_SESSION['products_list_'.$_SESSION['user_id']]); $i++) {
            // $find_prod = strpos($_SESSION['macart'][$i], $_SESSION['user_id'].'_');
            if (!empty($_SESSION['products_list_'.$_SESSION['user_id']][$i]['qty'])) {
              $counter += $_SESSION['products_list_'.$_SESSION['user_id']][$i]['qty'];
            }
          }
          echo $counter;

         } ?>
          
        </span></h5></a>
    
    
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><strong>Hi! <?php echo $_SESSION['first_name']; ?></strong><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Controller/users/logout.php"><strong>Logout </strong><span class="sr-only">(current)</span></a>
        </li>
      </ul>
    <?php endif; ?> 
    </form>
  </div>
</nav>
