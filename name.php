<?php
	include('./sql/connect.php');
	
	$sql = "SELECT name FROM schueler WHERE schuelerId = 1";
	$result = $db->query($sql);
?>
<html>
	<body>
		<table>
			<tr>
				<td><?php
					while ($row = $result->fetch_object()) {
					$name = $row->name;
					?>
						<td><?php echo $name; ?></td>
					<?php
						}

				 ?></td>
			</tr>
		</table>
		<?php
	$sql1 = "SELECT * FROM pruefung WHERE pruefungId = 6";
	$sql2 = "SELECT pruefung.pruefungId, schueler.name FROM pruefung JOIN schueler";
	$result1 = $db->query($sql2);
		?>
		<table>
			<tr>
				<td><?php
					while ($row = $result1->fetch_object()) {
					$name = $row->pruefungId;
					$name = $row->name;
					?>
						<td><?php echo $name; ?></td>
						<td><?php echo $name; ?></td>
					<?php
						}

				 ?></td>
			</tr>
		</table>
	</body>
</html>