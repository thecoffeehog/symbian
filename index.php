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
		header('Location: main.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SYMBIAN</title>
	<link href="css/main.css" rel="stylesheet">
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
		    	<li><a href="login.html">Login</a></li>
		    </ul>
		</nav>
	</header>
	<main>
		<div class="lead">
			<h1 class="lead-heading">Stay Connected!</h1>

	            <p class="lead-text">All of us have made friends, accquintances and many other relationships while we were living our four amazing years here at SIT and we want you to maintain those relationships by using this platform.</p>
	            <a href="register.html"><button class="lead-cta">Register Now!</button></a>
		</div>
	</main>
	<footer>
		<p id="footermsg">Developed by <abbr title="Udit-Swapnil-Sharad-Rahul">USSR</abbr></p>
	</footer>
</body>
</html>