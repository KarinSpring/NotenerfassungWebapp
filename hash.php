<?php
//require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//URL: https://stackoverflow.com/questions/20764031/php-salt-and-hash-sha256-for-login-password
include './sql/connect.php';
$postname = "admin";
$statement = $db->prepare("SELECT * FROM user WHERE name = ?");
$result->bind_param('s', $user['passwort']);
echo $db->connect_errno;
$result = $statement->execute();
echo $result;
die;
$user = $statement->fetch();

	//Überprüfung des Passworts
	if ($user !== false && password_verify($_GET['pw'], $user['passwort'])) {
	echo "Hello World";
}
/*
if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
*/
?>