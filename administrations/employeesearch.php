<?php
$connect = mysqli_connect("localhost", "root", "", "rsdl");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM drivers 
	WHERE code LIKE '%".$search."%'
	OR nationid LIKE '%".$search."%' 

	";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table">
					<thead>
						<tr>
							<th>Code</th>
							<th>First Name</th>
							<th>Last Name</th>	
							<th>Date of Birth</th>
							<th>Sex</th>	
							<th>National ID</th>					
							<th>phone</th>
							<th>Adress</th>							
							<th>RegDate</th>
							<th>Status</th>
							<th>User ID</th>	
							<th>More actions</th>
							</tr>
							<thead>';

	while($row = mysqli_fetch_array($result))
	{
		$output .= '
		<tbody>
			<tr>
			<form action="" method="post">
				<td>'.$row["code"].'</td>
				<td>'.$row["fname"].'</td>
				<td>'.$row["lname"].'</td>
				<td>'.$row["dob"].'</td>
				<td>'.$row["sex"].'</td>
				<td>'.$row["nationid"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["adress"].'</td>
				<td>'.$row["regdate"].'</td>
				<td>'.$row["status"].'</td>
				<td>'.$row["userid"].'</td>
				<td><button class="btn btn-primary" Name="submit"><i class="icon-check1"></i></button>
				<button class="btn btn-primary" Name="submit"><i class="icon-check1"></i></button></td>
				</form>



			</tr>
			</tbody>
		';
	}
	echo $output;
}


}
else
{
	echo 'Data Not Found';
}
?>