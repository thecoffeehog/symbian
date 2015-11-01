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
		$sql = "INSERT INTO EventsAttending VALUES('$susername','$','$_GET['rsvp']')";
		if($conn->query($sql) === TRUE) {	
			//retrun added
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else 
		header('Location: index.php');
?>