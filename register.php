<?php
	
	include './sql/connect.php';
	
	$postname = $_POST['newusername'];
	$postpasswort = $_POST['newpassword'];
	
	$options = [
		'cost' => 11,
	];
	
	$sql = "INSERT INTO user (name, passwort) VALUES ('$postname', '$postpasswort')";
	$result = $db->query($sql);
	echo $result;
	$url = "./index.php"; 
	header("Location: $url");
?>