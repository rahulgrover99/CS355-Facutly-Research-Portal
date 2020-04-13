<html>
	<head>
	<link rel="stylesheet" href="phpcss.css">
	<title>Publication Trends</title>
</head>

<body>
<?php
// echo "Hello World"; 
$yrs = $_GET['yrs']; 	

$con = mysqli_connect("db","user","test","myDb");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "select faculty.fname, COUNT(*) as cnt from faculty, author, publications where faculty.fid = author.fid and publications.pubid = author.pubid and 
year(publications.dop)= '$yrs' GROUP by(faculty.fid) order by cnt DESC;
";

$result = $con->query($sql);

if($result)
{
	if (mysqli_num_rows($result)!=0)
	{
		echo "<h3><center> Total Publications (in given year)</center> </h3>";
		echo "<table class = \"container\" >";
		echo "<tr> <th> Name </th> <th> Count </th></tr>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr>";
			printf("<td> %s </td> <td> %d </td>",$row['fname'], $row['cnt']);
			echo "</tr>";
		}
		echo "</table>";
	}	

	$result->free();
}

$sql = "create view VIEW1 as select faculty.fname, COUNT(*) as cnt from faculty, author, publications where faculty.fid = author.fid and publications.pubid = author.pubid and 
year(publications.dop)= '$yrs' GROUP by(faculty.fid) order by cnt DESC;";

$result = $con->query($sql);

// $result->free();

$sql = "select fname from VIEW1
where cnt = (SELECT cnt from VIEW1 LIMIT 1);";

$result = $con->query($sql);



if($result)
{
	if (mysqli_num_rows($result)!=0){

		echo("<p><center>The professsor(s) with most number of publications in the given year is/are : ");

		while($row = $result->fetch_assoc())
		{
			printf("%s ",$row['fname']);

		}
		echo("</p></center><br>");
	}
	$result->free();
}
$sql = "drop view VIEW1;";


$result = $con->query($sql);

$sql = "SELECT faculty.fname, count(*) as cnt FROM faculty, works, project
where faculty.fid = works.fid
and works.pid = project.pid GROUP BY faculty.fid
order by cnt DESC;";


$result = $con->query($sql);

if($result)
{
	if (mysqli_num_rows($result)!=0){
		echo "<h3><center> Total Projects</center> </h3>";
		echo "<table class = \"container\" >";
		echo "<tr> <th> Name </th> <th> Count </th></tr>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr>";
			printf("<td> %s </td> <td> %d </td>",$row['fname'], $row['cnt']);
			echo "</tr>";
		}
		echo "</table>";
	}
	$result->free();
}



$sql = "create view VIEW1 as SELECT faculty.fname, count(*) as cnt FROM faculty, works, project
where faculty.fid = works.fid
and works.pid = project.pid GROUP BY faculty.fid
order by cnt DESC;";

$result = $con->query($sql);

// $result->free();

$sql = "select fname from VIEW1
where cnt = (SELECT cnt from VIEW1 LIMIT 1);";

$result = $con->query($sql);



if($result)
{
	if (mysqli_num_rows($result)!=0){

		echo("<p><center>The professsor(s) with most number of projects is/are : ");

		while($row = $result->fetch_assoc())
		{
			printf("%s ",$row['fname']);

		}
		echo("</center></p>");
	}
	$result->free();
}
$sql = "drop view VIEW1;";


$result = $con->query($sql);
$con->close();
?>
<br><hr>
</body>
</html>