<?php
include 'db.php';
session_start();
$stmt = $db->prepare('UPDATE user_account SET password=:password WHERE user_account_id=:user_account_id');
$stmt->bindParam(':password', $_POST['password']);
$stmt->bindParam(':user_account_id', $_POST['user_account_id']);
echo $stmt->execute();
$_SESSION['password'] = $_POST['password'];
