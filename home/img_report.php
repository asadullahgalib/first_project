<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<table border="1" cellpadding="3" cellspacing="3">
			<tr align="center">
				<th width="250" height="30">Name</th>
				<th width="250" height="30">Image</th>
			</tr>
		</table>
	</center>
</body>
</html>

<?php
	$conn = mysqli_connect("localhost","root","","kpi");
	$sql = "SELECT * FROM img";
	$rst = mysqli_query($conn,$sql);

	if(mysqli_num_rows($rst)){
		while ($row=mysqli_fetch_row($rst)) {
			echo "<center>
				<table border='1' cellpadding='3' cellspacing='3'>
					<tr align='center'>
						<td width='250' height='30'>$row[1]</td>
						<td width='250' height='30'><img src='$row[2]' width='250' height='150'></td>
					</tr>
				</table>
			</center>
			";
		}
	}
?>
