<?php
include 'db.php';
session_start();

$stmt = $db->prepare('UPDATE user_account SET password=:password, password_hint=:password_hint WHERE user_account_id=:user_account_id');
$stmt->bindParam(':password', md5($_POST['password']));
$stmt->bindParam(':user_account_id', $_POST['user_account_id']);
$stmt->bindParam(':password_hint', substr_replace($_POST['password'], str_repeat('*', strlen($_POST['password']) - 2), 1, strlen($_POST['password']) - 2));
echo $stmt->execute();
$_SESSION['password'] = md5($_POST['password']);
