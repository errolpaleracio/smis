<?php
$db = new PDO("mysql:host=localhost;dbname=j2v2", 'root', '');

$stmt = $db->query("SELECT * FROM username");
$result = $stmt->fetch();

 echo '<pre>', var_dump($result) , '</pre>';