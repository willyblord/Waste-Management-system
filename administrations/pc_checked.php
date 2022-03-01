<?php
$connect = mysqli_connect("localhost", "root", "", "security");
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM pc_servillance  WHERE MONTH(inserted_date)= MONTH(now()) AND code LIKE '%".$search."%'
	OR id_number LIKE '%".$search."%' OR owner LIKE '%".$search."%'

	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
		$code= $row['code'];
		$name= $row['owner'];
		$pcModel= $row['pc_model'];
		$phone= $row['phone'];
		$status= $row['status'];
		$id= $row['id_number'];
		$pcColor= $row['pc_color'];
		$id_number= $row['id_number'];
		$serialNumber= $row['serial_number'];
	}?>
<table id="bs4-table" class="table table-bordered alert-success">
<tr>
<td><?php echo $code;?></td>
<td><?php echo $name;?></td>
<td><?php echo $id;?></td>
<td><?php echo $status;?></td>
<td><?php echo $phone;?></td>
<td><?php echo $pcModel;?></td>
<td><?php echo $serialNumber;?></td>
<td><?php echo $pcColor;?></td>
</tr>
</table>
<?php 
}
}

?>