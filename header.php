<?php
session_start();
if(basename($_SERVER['PHP_SELF']) != 'register.php'){
	if(isset($_SESSION['name']) && basename($_SERVER['PHP_SELF']) == 'index.php')
		header('location: home.php');

	if(!isset($_SESSION['name']) && basename($_SERVER['PHP_SELF']) != 'index.php')
		header('location: index.php');
}

include 'configure.php';
include 'db.php';
$branch = $db->prepare('SELECT branch_name FROM branch WHERE branch_id=?');
@$branch->execute(array($_SESSION['branch_id']));
@$title = $branch->fetch(PDO::FETCH_OBJ)->branch_name;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="css/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/datatables.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/datatables.bootstrap.min.js"></script>
</head>
<body>
	<?php include $nav_path;?>