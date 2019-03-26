<nav class="navbar navbar-default navbar-static-top" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $title?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['name'])):?>
        <?php if($_SESSION['role_id'] == '1'):?>
          <li><a href="product.php">PRODUCTS <i class="fa fa-book"></i></a></li>
          
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SALES <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sales.php">ADD SALES <i class="fa fa-book"></i></a></li>
            <li><a href="view_sales.php">VIEW SALES <i class="fa fa-book"></i></a></li>
          </ul>
        </li>
        <?php else:?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTS <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="product.php?branch_id=1">BRANCH 1 <i class="fa fa-book"></i></a></li>
				<li><a href="product.php?branch_id=2">BRANCH 2 <i class="fa fa-book"></i></a></li>
			</ul>
		</li>
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SALES <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="view_sales.php?branch_id=1">BRANCH 1 <i class="fa fa-book"></i></a></li>
				<li><a href="view_sales.php?branch_id=2">BRANCH 2 <i class="fa fa-book"></i></a></li>
			</ul>
		</li> 
        <?php endif;?>   
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $_SESSION['name']?> <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="logout.php">Logout <i class="fa fa-user"></i></a></li>
			</ul>
		</li>
        <?php endif;?>
        <?php if(!isset($_SESSION['name'])):?> 
          <li><a href="#" data-toggle="modal" data-target="#loginModal">LOGIN <i class="fa fa-user"></i></a></li>
        <?php endif;?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
