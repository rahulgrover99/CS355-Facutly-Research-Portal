<html>
	<head>
	<link rel="stylesheet" href="phpcss.css">
	<title>Position of Responsibilities</title>
</head>

<?php
// echo "Hello World"; 
$fid = $_GET['fid']; 	
 
$con = mysqli_connect("db","user","test","myDb");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT faculty.fname, works.role, project.pname, project.budget, project.sponsor from faculty, works, project where faculty.fid = works.fid and project.pid = works.pid and faculty.fid = '$fid';";

$result = $con->query($sql);

if($result)
{
	echo "<table class = \"container\">";
	echo "<tr> <th> Name </th> <th> POR </th> <th> Project Name </th> <th> Budget </th><th> Sponsor </th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td>",$row["fname"], $row['role'],$row['pname'], $row['budget'], $row['sponsor']);
		echo "</tr>";
	}
	echo "</table>";

	$result->free();
}

$sql = "SELECT faculty.fname, sum(project.budget)/100000 as money from faculty, works, project where faculty.fid = works.fid and project.pid = works.pid and faculty.fid = '$fid';";

$result = $con->query($sql);

if($result)
{
	while($row = $result->fetch_assoc())
	{
		printf("&emsp;Total funds controlled by %s is : %s (in Lakhs)",$row['fname'], $row['money']);
	}
	$result->free();
}


$con->close();
?>


</html>