<?php
session_start();
require 'database.php';
if(isset($_POST['name'])&&isset($_POST['start'])&&isset($_POST['end'])){
	$insert = "INSERT INTO events (name, start, end) VALUES (?, ?, ?)";
	$stmt = $mysqli->prepare($insert);
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
		exit;
	}
	
	$stmt->bindParam('sss', $_POST['name'], $_POST['start']), $_POST['end']); //possible error: are datetimes strings?
	$stmt->execute();
	$stmt->close(); 
}
?>
