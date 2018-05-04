<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form method="post" action="" enctype="multipart/form-data">
			<table border="1" cellpadding="3" cellspacing="3">
				<tr align="center">
					<td width="300" height="30">Name</td>
					<td width="300" height="30"><input type="text" name="name" placeholder="Enter your name"></td>
				</tr>
				<tr align="center">
					<td width="300" height="30">Image</td>
					<td width="300" height="30"><input type="file" name="img"></td>
				</tr>
				<tr align="right">
					<td width="600" colspan="2"><input type="submit" name="btn" value="submit"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>

<?php
	if(isset($_POST['btn'])){

		$name = $_POST['name'];
		$img = $_FILES["img"];
		$sr = $img["tmp_name"];
		$dst = "dir/".$img["name"];

		$conn = mysqli_connect("localhost","root","","kpi");
		if(move_uploaded_file($sr, $dst)){
			$sql = "INSERT INTO img(name,img) VALUES('$name','$dst')";
			if($rst = mysqli_query($conn,$sql)){
				header('location:img_report.php');
			}
		}
	}
?>