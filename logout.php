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
	session_unset();
	echo "You are now logged out. Redirecting to homepage!";
	header( "refresh:2;url=index.php" );
?>