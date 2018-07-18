<?php
	
	include './sql/connect.php';
	
	$postname = $_POST['newname'];
	$postbeschreibung = $_POST['newdescription'];
	$posttyp = $_POST['modultyp'];

	$sql = "INSERT INTO modul (name, beschreibung, typ) VALUES ('$postname', '$postbeschreibung', '$posttyp')";
	$result = $db->query($sql);
	echo $result;
	$url = "./module.php"; 
	header("Location: $url");
?>