<?php
$fid = $_GET['fid']; 	
$name = $_GET['name'];
$dept = $_GET['dept'];
$doj = $_GET['doj'];
$url = $_GET['url'];
 
$con = mysqli_connect("db","user","test","myDb");

// Checking connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * from faculty WHERE fid = '$fid' or fname = '$fname'";
$result = $con->query($sql);
if($result)
{
	if (mysqli_num_rows($result)!=0)
	{
		echo "This entry already exists.";
	}
	else{
		$sql = "INSERT INTO faculty VALUES ('$fid', '$name', '$dept', '$doj', '$url');";
		$con->query($sql);
		echo "<center>Faculty successfully added!!!</center>";
		
	}
	echo "<br><br><center><a href = 'index.php'> Home </a></center>";
}
$con->close();
?>

