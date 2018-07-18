<?php
	include './sql/connect.php';
	
	//DELETE VIA LINK
	//DELETE FROM pruefung WHERE pruefungId = 'xx';
	if ($_GET['action'] == "del") {
		$delid = $_GET['id'];
		$sql = "DELETE FROM pruefung WHERE pruefungId = '$delid'";
		$result = $db->query($sql);
		$url = "./pruefung.php"; 
		header("Location: $url");
	}
?>
<html>
	<head>
		<title>pruefung</title>
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
				Pruefungen
			</div>
			<div id="pagemenu">
				<select id="klassenfilter">
					<option value="SELECT * FROM `pruefung` ORDER BY `name`">Alle Pruefungen</option>
					<option value="1">Klasse 1</option>
					<option value="2">Klasse 2</option>
				</select>
				<button>Uebernehmen</button>
			</div>
			<div id="pruefungsliste">
				<table id="examtable">
					<tr>
						<th colspan="3">Neue Pruefung</th>
					</tr>
					<tr>
						<form action="newexam.php" method="post">
						<td><input type="text" name="newname" placeholder="Pruefungsname"></td>
						<td><input type="text" name="newmodul" placeholder="Modulname"></td>
						<td><input type="text" name="newschueler" placeholder="Schueler"></td>
						<td><input type="text" name="newnote" placeholder="Note"></td>
						<td><input type="text" name="newweight" placeholder="Gewichtung in %"></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Speichern"></td>
						</form>
					</tr>

					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Modul</th>
						<th>Schueler</th>
						<th>Note</th>
						<th>Gewichtung</th>
					</tr>
					<?php
						$sql = "SELECT * FROM `pruefung` ORDER BY `name`";
						$result = $db->query($sql);
						$sql = "SELECT pruefung.pruefungId, schueler.name FROM pruefung JOIN schueler";
						$result1 = $db->query($sql);
						$sql = "SELECT pruefung.pruefungId, modul.name FROM pruefung JOIN modul";
						$result2 = $db->query($sql);
						while ($row = $result->fetch_object()) {
							$id = $row->pruefungId;
							$name = htmlentities($row->name, ENT_QUOTES, "UTF-8");
							$modul; //= htmlentities($row->fkModulId, ENT_QUOTES, "UTF-8");
							$schueler; //= htmlentities($row->fkSchuelerId, ENT_QUOTES, "UTF-8");
							while ($row1 = $result1->fetch_object()) {
								$schueler = $row1->name;
							}
							while ($row2 = $result2->fetch_object()) {
								$modul = $row2->name;
							}
							$note = htmlentities($row->note, ENT_QUOTES, "UTF-8");
							$gewichtung = htmlentities($row->gewichtung, ENT_QUOTES, "UTF-8");
					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $modul; ?></td>
						<td><?php echo $schueler; ?></td>
						<td><?php echo $note; ?></td>
						<td><?php echo $gewichtung; ?>%</td>
						<td><a href="./pruefung.php?action=del&id=<?= $id ?>">Löschen</a></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>