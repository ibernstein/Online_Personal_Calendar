<?php
session_start();
require 'database.php';
//check session id
header("Content-Type: application/json");
if(isset($_POST['eventTitle'])&&isset($_POST['eventStart'])&&isset($_POST['eventEnd'])&&isset($_POST['cat'])){
	$insert = "INSERT INTO events (name, start, end, category) VALUES (?, ?, ?, ?)";
	$stmt = $mysqli->prepare($insert);
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
		echo json_encode(array(
		"success" => false
	));
		exit;
	}
	
	$stmt->bindParam('ssss', $_POST['eventTitle'], $_POST['eventStart'], $_POST['eventEnd'], $_POST['cat']); 
	$stmt->execute();
	$stmt->close();
	echo json_encode(array(
		"success" => true
	));
	exit;
}

else if(isset($_POST['eventTitle'])&&isset($_POST['eventStart'])&&isset($_POST['cat'])){
	$insert = "INSERT INTO events (name, start, category) VALUES (?, ?, ?)";
	$stmt = $mysqli->prepare($insert);
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
		echo json_encode(array(
		"success" => false
	));
		exit;
	}
	
	$stmt->bindParam('sss', $_POST['eventTitle'], $_POST['eventStart'], $_POST['cat']); //possible error: datetime format
	$stmt->execute();
	$stmt->close();
	echo json_encode(array(
		"success" => true
	));
	exit();
}
	echo json_encode(array(
		"success" => false,
		"message" => "not set"
	));
	exit();
?>
