<?php
	include './sql/connect.php';
	
	$postname = $_POST['username'];
	$postpasswort = $_POST['password'];

	$sql = "SELECT * FROM user WHERE name LIKE '$postname'";
	$result = $db->query($sql);
	
	$dbname;
	$dbpasswort;
	
	while ($row = $result->fetch_object()) {
		$dbname = htmlentities($row->name, ENT_QUOTES, "UTF-8");
		$dbpasswort = htmlentities($row->passwort, ENT_QUOTES, "UTF-8");
	}
	if ($postname == $dbname || password_verify($postpasswort, $dbpasswort)) {
		if ($_GET['action'] == "del") {
			$delid = $_GET['id'];
			$sql = "DELETE FROM modul WHERE modulId = '$delid'";
			$result = $db->query($sql);
			$url = "./module.php"; 
			header("Location: $url");
		}
?>
<html>
	<head>
		<title>module</title>
		<link rel="stylesheet" type="text/css" href="./css/main.css">
	</head>
	<body>
		<div id="head">
			Notenverwaltung
		</div>
		<div id="mainmenu">
			<a href="./module.php">Module</a> |
			<a href="./pruefung.php">Pruefungen</a> |
			<a href="./avg.php">Durchschnitte</a> |
			<a href="./index.php">Ausloggen</a>
		</div>
		<div id="content">
			<div id="pagetitle">
				Module
			</div>
			<div name="selectmodul">
				<select id="modulefilter">
					<option value="SELECT * FROM modul">Modul wählen...</option>
					<option value="1">Modul 1</option>
					<option value="2">Modul 2</option>
				</select>
				<button>Uebernehmen</button>
			</div>
			<div id="modulliste">
				<table id="modultable">
					<tr>
						<th colspan="3">Neues Modul</th>
					</tr>
					<tr>
						<form action="newmodule.php" method="post">
						<td><input type="text" name="newname" placeholder="Modulname"></td>
						<td><input type="text" name="newdescription" placeholder="Beschreibung"></td>
						<td><input type="radio" name="modultyp" value="Fachmodul"> Fachmodul<br /><input type="radio" name="modultyp" value="Grundlagenmodul"> Grundlagenmodul<br /><input type="radio" name="modultyp" value="Allgemeinbildung"> Allgemeinbildung</td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Speichern"></td>
						</form>
					</tr>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Beschreibung</th>
						<th>Typ</th>
					</tr>
					<?php
						$sql = "SELECT * FROM `modul` ORDER BY `name`";
						$result = $db->query($sql);
						while ($row = $result->fetch_object()) {
							$id = $row->modulId;
							$name = htmlentities($row->name, ENT_QUOTES, "UTF-8");
							$beschreibung = htmlentities($row->beschreibung, ENT_QUOTES, "UTF-8");
							$typ = htmlentities($row->typ, ENT_QUOTES, "UTF-8");
					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $beschreibung; ?></td>
						<td><?php echo $typ; ?></td>
						<td><a href="./module.php?action=del&id=<?= $id ?>">Loeschen</a></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
<?php
	} else {
		$url = "./error.php"; 
		header("Location: $url");
	}
?>