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
//To check whether a user with similar username or email id exists in the database
session_start();	
	if(isset($_SESSION['suusername']) && !empty($_SESSION['suusername'])) {
		$suusername = $_SESSION["suusername"];
		$sql="INSERT INTO announcements(AID, ATitle, ADesc) VALUES ('$_POST[aid]','$_POST[title]','$_POST[description]')";
	}
	else 
		header('Location: index.php');
	if($conn->query($sql) === TRUE) {
				echo "Event Added Successfully!!";
			}
			else
				echo "Error: " . $sql . "<br>" . $conn->error;

?>
