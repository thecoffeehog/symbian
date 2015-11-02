<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "9374070589";
$dbname = "symbian";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	session_start();	
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
		$susername = $_SESSION["username"];
		$sql = "UPDATE registered SET status = '$_GET[status]' WHERE Username ='$susername'";
		if ($conn->query($sql) === TRUE) {
			echo "Status Updated!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
?>
