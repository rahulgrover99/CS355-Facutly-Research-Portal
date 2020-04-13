<?php
$pid = $_GET['id']; 	
$name = $_GET['name'];
$bug = $_GET['bug'];
$sp = $_GET['sp'];
$facs = $_GET['facs'];
$role = $_GET['role'];

$con = mysqli_connect("db","user","test","myDb");

// Checking connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * from project WHERE pid = '$pid' or pname = '$name'";
$result = $con->query($sql);

if($result)
{
	if (mysqli_num_rows($result)!=0)
	{
		echo "This entry already exists.";
	}
	else{
		$sql = "INSERT INTO project VALUES ('$pid', '$name', '$bug', '$sp');";
		$con->query($sql);
		for($i = 0; $i < count($facs); $i++)
		{
			$sql1 = "INSERT INTO works VALUES ('$pid', '$facs[$i]', '$role[$i]');";
			$con->query($sql1);
		}
		echo "<center>Project successful added!!!</center>";
	}
}
echo "<br><br><center><a href = index.php> Home </a></center>";
$con->close();
?>
