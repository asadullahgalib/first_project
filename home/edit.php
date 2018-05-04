<?php
	$em="";
	$em=$_GET['em'];
	$conn=mysqli_connect("localhost","root","","kpi");
	$sql="SELECT * FROM img WHERE id=".$em;
	$rst=mysqli_query($conn,$sql);
	if(mysqli_num_rows($rst))
	{
		$row=mysqli_fetch_row($rst);
	
?>
<center>
	<body>
		<table border="1"cellpadding="3"cellspacing="3">
			<tr align="center">
				<th width="100">Image</th>
				<th width="100">ID</th>
			</tr>
			<tr align="center">
				<td width="100"><input type="file"name="pic"value="<?php echo <img scr=\"$row[0]\"alt=\"style\"width=\"80\"height=\"90\"> ?>"></td>
				<td width="100"><input type="number"name="id"value="<?php echo $row[1]; ?>"></td>
			</tr>
		</table>
	</body>
</center>
<?php
	}
	else
	{
		echo "Error in SQL";
	}
	if(isset($_POST['btn']))
	{

	}
?>