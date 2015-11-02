<?php  
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "9374070589";
	$dbname = "symbian";
			$eventid = $_GET['eventid'];

	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	session_start();	
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
		$susername = $_SESSION["username"];
		$sql = "SELECT * FROM Events WHERE EventId=$eventid";
		$result = $conn->query($sql);	
		if($result->num_rows == 1) {	
			$row = $result->fetch_assoc();
			$eventTitle = $row['Title'];
			$eventStartDate = $row['StartDate'];
			$eventEndDate = $row['EndDate'];
			$eventDescription = $row['Description'];
		}
		else {
			echo 'Error in fetching data!';
		}
	}
	else 
		header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SYMBIAN</title>
	<link href="css/main.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
	<link href="css/updateprofileconfirmation.css" rel="stylesheet">
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
			<h1><?php echo "$eventTitle";?></h1>
			<h3>Start Date: <?php echo "$eventStartDate";?> &nbsp&nbsp&nbspEnd Date: <?php echo "$eventEndDate";?></h3>	
			<p id="eventDescription"><?php echo "$eventDescription";?>
			</div>
		</div>
	</div>
</body>
</html>