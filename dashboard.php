<?php 
include 'header.php';
$sql = '';
$product_count = 0;
$sale_count = 0;

if($_SESSION['branch_id'] == '3'){
    $stmt = $db->query('SELECT COUNT(*) AS product_count FROM PRODUCT');
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $product_count = $result->product_count;

    $stmt = $db->query('SELECT COUNT(*) AS sale_count FROM SALES');
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $sale_count = $result->sale_count;
}else{
    $stmt = $db->prepare('SELECT COUNT(*) AS product_count FROM PRODUCT WHERE branch_id=:branch_id');
    $stmt->bindParam(':branch_id', $_SESSION['branch_id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $product_count = $result->product_count;

    $stmt = $db->prepare('SELECT COUNT(*) AS sale_count FROM SALES WHERE branch_id=:branch_id');
    $stmt->bindParam(':branch_id', $_SESSION['branch_id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $sale_count = $result->sale_count;
}

?>

<body>
<div id="wrapper">
<?php include 'sb_admin_nav.php'?>
<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $sale_count;?></div>
                        <div>Sales</div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="caret"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="product.php?branch_id=1">Branch 1</a></li>
                    <li><a href="product.php?branch_id=2">Branch 2</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $product_count;?></div>
                        <div>Products</div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="caret"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="view_sales.php?branch_id=1">Branch 1</a></li>
                    <li><a href="view_sales.php?branch_id=2">Branch 2</a></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>
<!-- /.row -->

<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<?php include 'footer.php';?>