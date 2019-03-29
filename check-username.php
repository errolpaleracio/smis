<?php
include 'db.php';

$stmt = $db->prepare('SELECT COUNT(*) as user_count FROM user_account WHERE username=:username');
$stmt->bindParam(':username', $_GET['username']);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

echo $result->user_count;