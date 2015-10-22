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
	$susername = $_SESSION["username"];
	$sql = "SELECT DPName FROM registered WHERE username = '$susername'";
	$result = $conn->query($sql);
	if($result->num_rows == 1) {	
		$row = $result->fetch_assoc();
		$imgname = $row['DPName'];
	}
	else {
		echo 'Error in fetching image!';
	}
?>
<!DOCTYPE html>
	
<html>
<head>
	<title>SYMBIAN</title>
	<link href="css/main.css" rel="stylesheet">
	<link href="css/updateprofileconfirmation.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<nav class="navbar">
		    <ul>
		    <a href="index.php" id="header-link"><h2 id="header-logo"><abbr title="Symbiosis Insitute of Technology Alumni Network">Symbian</abbr></h2></a>
		        <li><a href="index.php">Home</a></li>
		        <li><a href="about.html">About</a></li>
		     	<li><a href="contact-us.html">Contact</a></li>
		    	<li><a href="logout.php">Logout</a></li>
		    </ul>
		</nav>
	</header>
	<div class="main">
		<div class="wrapper">
			<div class="updated-profile">
				<div class="dp">
					<?php echo "<img src=\"dp/"."$imgname\"/>" ?> 
					<p> DP Uploaded!</p>
					Click <a href="main.php">here</a> to go to the main page.	
				</div>
			</div>
		</div>
	</div>
</body>
</html>