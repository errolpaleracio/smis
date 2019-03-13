<?php
include 'db.php';
$stmt = $db->prepare('DELETE FROM product WHERE product_id=?');
$stmt->execute(array($_GET['product_id']));
header('location: product.php');