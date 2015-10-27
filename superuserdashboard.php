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
	if(isset($_SESSION['suusername']) && !empty($_SESSION['suusername'])) {
	    $username = $_SESSION["suusername"];
	    $userPrevID = $_SESSION["PrivilegeID"];
	}
	else 
		header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SYMBIAN</title>
	<link href="css/main.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<nav class="navbar">
		    <ul>
		    <a href="index.php" id="header-link"><h2 id="header-logo"><abbr title="Symbiosis Insitute of Technology Alumni Network">Symbian</abbr></h2></a>
		        <li><a href="superuserdashboard.php">Home</a></li>
		        <li><a href="about.html">About</a></li>
		     	<li><a href="contact-us.html">Contact</a></li>
		     	<li><a href="logout.php">Logout</a></li>
		    </ul>
		</nav>
	</header>
	<main>
	<div class="main">
		<div class="wrapper">
			<div class="buttons-container">
				<?php if($userPrevID==1) echo "<a href=\"addsuperuser.html\"><button>Add a superuser</button></a><br>" ?>
				<a href="addevent.html"><button>Add a event</button></a><br>
				<button>Add a announcement</button><br>
			</div>
		</div> 
	</div>	
	</main>
</body>
</html>