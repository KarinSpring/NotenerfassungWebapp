<html>
	<head>
		<title>log in</title>
	</head>
	<body>
		LogIn<br />
		<form action="./module.php" method="post">
			<input type="text" name="username">
			<input type="password" name="password">
			<input type="submit" value="log in">
		</form>
		Registriere dich<br />
		<form action="register.php" method="post">
			<input type="text" name="newusername" placeholder="new username"><br />
			<input type="password" name="newpassword" placeholder="new password">
			<input type="submit" value="Registrieren">
		</form>
	</body>
</html>