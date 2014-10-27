<?php
session_start();
require 'database.php';
//check session id
header("Content-Type: application/json");
if(isset($_POST['name'])&&isset($_POST['start'])&&isset($_POST['cat'])){
	
	$stmt = $mysqli->prepare("INSERT INTO events (name, start, end, category) VALUES (?, ?, ?, ?)");
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
		echo json_encode(array(
		"success" => false,
		"message" => "Query Prep Failed"
		));
		exit;
	}
	
	$stmt->bind_param('ssss', $_POST['name'], $_POST['start'], $_POST['end'], $_POST['cat']); 
	$stmt->execute();
	$stmt->close();

	echo json_encode(array(
		"success" => true
	));
	exit;
}
	echo json_encode(array(
		"success" => false,
		"message" => "Not all forms filled in correctly"
	));
	exit;
?>