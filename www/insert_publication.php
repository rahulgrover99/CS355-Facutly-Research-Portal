<?php
$id = $_GET['id']; 	
$pg = $_GET['pg'];
$name = $_GET['name'];
$topic = $_GET['topic'];
$dop = $_GET['dop'];
$cn = $_GET['cn'];
$jn = $_GET['jn'];
$vol = $_GET['vol'];
$num = $_GET['num'];


$facs = $_GET['facs'];
$arank = $_GET['arank'];

$con = mysqli_connect("db","user","test","myDb");

// Checking connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * from publications WHERE pubid = '$id' or pname = '$name';";
$result = $con->query($sql);

if($result)
{
	if (mysqli_num_rows($result)!=0)
	{
		echo "This entry already exists.";
	}
	else{
		if($cn == '')
		{
			$sql = "INSERT INTO publications VALUES ('$id', '$name', '$dop', '$pg', '$topic');";
			$con->query($sql);
			$sql1 = "INSERT INTO journal VALUES ('$id', '$jn', '$vol', '$num');";
			$con->query($sql1);
			for($i = 0; $i < count($facs); $i++)
			{
				$sql2 = "INSERT INTO author VALUES ('$facs[$i]', '$id', '$arank[$i]');";
				$con->query($sql2);
			}
		}
		if($jn == '')
		{
			$sql = "INSERT INTO publications VALUES ('$id', '$name', '$dop', '$pg', '$topic');";
			$con->query($sql);
			$sql1 = "INSERT INTO conference VALUES ('$id', '$cn');";
			$con->query($sql1);
			for($i = 0; $i < count($facs); $i++)
			{
				$sql2 = "INSERT INTO author VALUES ('$facs[$i]', '$id', '$arank[$i]');";
				$con->query($sql2);
			}
		}
		echo "<center>Publication successful added!!!</center>";
	}

}


echo "<br><br><center><a href = 'index.php'> Home </a></center>";
$con->close();
?>
