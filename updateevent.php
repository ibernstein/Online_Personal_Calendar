<?php
session_start();
require 'database.php';
//can add in if statements for isset the variables 
$insert = "UPDATE events SET start = ?, end = ? WHERE id = ?";

$stmt = $db->prepare($insert);

$stmt->bindParam('iss',$_POST['id'], $_POST['newStart'], $_POST['newEnd']);

$stmt->execute();
$stmt->close(); 
?>