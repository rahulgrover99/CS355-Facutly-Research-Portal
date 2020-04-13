<html>
	<head>
	<link rel="stylesheet" href="phpcss.css">
	<title>Publication Trends</title>
</head>

<?php
// echo "Hello World"; 
$fid = $_GET['fid']; 	
$yrs = $_GET['yrs'];
 
$con = mysqli_connect("db","user","test","myDb");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "select fname, dop, pname, topic, ARank from faculty, publications, author
where publications.pubid = author.pubid
and faculty.fid = author.fid
and adddate(publications.dop, INTERVAL '$yrs' YEAR) > curdate()
and faculty.fid = '$fid';";

$result = $con->query($sql);

if($result)
{
	echo "<table class = \"container\">";
	echo "<tr> <th> Name </th> <th> DOP </th> <th> Paper </th> <th> Topic </th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td>",$row["fname"], $row['dop'],$row['pname'], $row['topic']);
		echo "</tr>";
	}
	echo "</table>";

	$result->free();
}

$sql = "select topic, count(topic) as cnt from publications, author, faculty
where publications.pubid = author.pubid
and faculty.fid = author.fid
and adddate(publications.dop, INTERVAL '$yrs' YEAR)>curdate()
and faculty.fid = '$fid'
group by publications.topic;;";

$result = $con->query($sql);

if($result)
{
	echo "<br> <table class = \"container\">";
	echo "<tr> <th> Topic </th> <th> Count </th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %d </td>", $row["topic"], $row['cnt']);
		echo "</tr>";
	}
	echo "</table>";

	$result->free();
}

$con->close();
?>


</html>