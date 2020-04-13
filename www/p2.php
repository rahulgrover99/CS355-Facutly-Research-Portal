<html>
	<head>
	<link rel="stylesheet" href="phpcss.css">
	<title>Publication Trends</title>
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

$sql = "select fname, count(a1.fid) as cnt from author as a1, author as a2, faculty
where a1.pubid = a2.pubid
and a1.fid != a2.fid
and a2.fid = '$fid'
and faculty.fid = a1.fid
group by a2.fid, a1.fid;
";

$result = $con->query($sql);

if($result)
{
	echo "<table class = \"container\" >";
	echo "<tr> <th> Name </th> <th> Count </th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %d </td>",$row['fname'], $row['cnt']);
		echo "</tr>";
	}
	echo "</table>";

	$result->free();
}

	
$con->close();
?>
</html>