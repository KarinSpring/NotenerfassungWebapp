<?php
	
	include './sql/connect.php';
	
	$postname = $_POST['newname'];
	$postmodul = $_POST['newmodul'];
	$postschueler = $_POST['newschueler'];
	$postnote = $_POST['newnote'];
	$postgewichtung = $_POST['newweight'];
	
	$sql = "INSERT INTO pruefung (name, fkModulId, fkSchuelerId, note, gewichtung) VALUES ('$postname', '$postmodul', '$postschueler', '$postnote', '$postgewichtung')";
	$result = $db->query($sql);
	echo $result;
	$url = "./pruefung.php"; 
	header("Location: $url");
?>