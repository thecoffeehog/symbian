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

$userCheckQuery = "SELECT * FROM superusers WHERE username = '$_POST[user_name]' OR email = '$_POST[email]' ";
$userCheckResult = $conn->query($userCheckQuery);

if($userCheckResult->num_rows > 0) {
		echo "A user with similar email id/username exists in the database.<br>Please try registering with a different email id/username";
}
else {

		if($_POST['password_confirmation']==$_POST['password']) {
			$sql = "INSERT INTO superusers (FirstName,LastName,Username,Email,Password,PrivilegeID)
			VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[user_name]','$_POST[email]','$_POST[password]','$_POST[privilege]')";
		}
		else {
			echo "Confirm password and password fields don't have matching values!";
		}

		if($conn->query($sql) === TRUE) {
			echo "User added Succesfully!";
		}
		else
			echo "Unsuccesful";
}
?>
