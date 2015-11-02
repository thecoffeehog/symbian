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
		$sql = "INSERT INTO Following (Username,Follows) 	VALUES ('$susername','$_GET[username]')";
		if ($conn->query($sql) === TRUE) {
			echo "Followed!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
?>
