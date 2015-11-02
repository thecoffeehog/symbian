<?php  
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "9374070589";
	$dbname = "symbian";
	$counter=0;
	$counter2=0;
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	session_start();	
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
		$susername = $_SESSION["username"];
		$sql = "SELECT DPName,FirstName FROM registered WHERE username = '$susername'";
		$result = $conn->query($sql);
		if($result->num_rows == 1) {	
			$row = $result->fetch_assoc();
			$imgname = $row['DPName'];
			$userFirstName = $row['FirstName'];
		}
		else {
			echo 'Error in fetching image!';
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
	<script src="js/rsvp.js"></script>
</head>
<body>
	<header>
		<nav class="navbar">
		    <ul>
		    <a href="index.php" id="header-link"><h2 id="header-logo"><abbr title="Symbiosis Insitute of Technology Alu	mni Network">Symbian</abbr></h2></a>
		        <li><a href="index.php">Home</a></li>			
		    	<li><a href="logout.php">Logout</a></li>
		    	<div class="nav-dp-dropdown-container" style="margin-top:5px;">
		    	<?php 
		    	echo "<img class=\"nav-dp-dropdown-btn\"src=\"dp/"."$imgname\"/>" ?>
		    	</div>
		    	<li> <?php echo "<p id=\"userfirstname\"> $userFirstName</p>";?></li>
		    </ul>
		</nav>
	</header>
	<div class="main">
		<div class="wrapper">
			<div class="friend-suggestions">
				<h3>People you may know</h3>
				<hr>
				<?php
					$queryToGetSuggerstions ="SELECT FirstName,LastName,Username,DPName,Batch FROM registered LIMIT 10";
					$suggestions = $conn->query($queryToGetSuggerstions);
					while($counter<5 && $counter<$suggestions->num_rows) {
						$row = $suggestions->fetch_assoc();
						$userCheck = "SELECT * FROM Following WHERE Username='$susername' AND Follows='$row[Username]'";
						$resultCheck = $conn->query($userCheck);
						if($resultCheck->num_rows > 0 || $susername==$row['Username']) {	
							$counter++;
						}
						else {
							echo "<div class=\"suggestion-card\">";
							echo "<img src=\"dp/".$row['DPName']."\"/>";
							echo "<h5>".$row['FirstName']."&nbsp&nbsp".$row['LastName']."</h5>";
							echo "<h5>".$row['Batch']."-".($row['Batch']+4)."</h5>";
							echo "<input type=\"submit\" id=\"button".$counter."\"class=\"follow_button\" value=\"Follow\" onclick=\"follow('".$row['Username']."','$counter')\"></input>";
							echo "</div><hr>";
							$counter++;							
						}
					}
					

					?>
			</div>
			<div class="status">
				<textarea class="status-text-area" id="status-text-area"pattern=".{5,160}" maxlength="160"required title="5 to 160 characters"placeholder="Share something you would like your batch mates to know!"></textarea>
				<input type="submit" class="ss_button" value="Set Status" onclick="setStatus()"></input>
			</div>
			
				<?php
				$queryToGetStatus ="SELECT FirstName,LastName,DPName,status FROM registered WHERE Username IN (SELECT Follows FROM Following WHERE Username='$susername')";
				$resultStatus = $conn->query($queryToGetStatus);
				while($counter2<5 && $counter2<$resultStatus->num_rows) {
					$row2 = $resultStatus->fetch_assoc();
					if($row2['status']!="") {
					echo "<div class=\"feeds\">";
					echo "<h3>Status Update</h3><br>";
					echo "<img src=\"dp/".$row2['DPName']."\"/>";
					echo "<h5>".$row2['FirstName']."&nbsp".$row2['LastName']."</h5>";
					echo  "<p>".$row2['status']."</p>";	
					echo "</div>";
					}
					$counter2++;
				}
				?>

			<div class="upcoming-events">
			<?php
				$sql = "SELECT * FROM Events";
				$result = $conn->query($sql);
				if($result->num_rows == 0) {
					echo "No Upcoming Events";
				}
				else {?>
					<table border="0">
					<caption><h3>Upcoming Events</h3></caption>
						<tr>
							<th>Event Name</th>
							<th colspan="2">Event Date</th>
						</tr>
						<?php while ($row = $result->fetch_assoc()) {?>
						<tr>
				    		<?php echo "<td>"."<a href=\"viewevent.php?eventid=".$row["EventID"]."\">".$row["Title"]."</a></td>";?>
							<?php echo "<td>".$row['StartDate']."</td>";?>
							<!-- <td id = "yes" value="1" onclick="updateRsvp('1',<?php echo $row["EventID"]?>)" rowspan="2">Yes</td>
							<td id = "no" value="0" onclick="updateRsvp('0',<?php echo $row["EventID"]?>)" rowspan="2">No</td> -->
						</tr>
						<tr>
							<?php echo "<td id=\"event-date\">".date("F j, Y",strtotime($row["StartDate"]))."</td>";?>
						</tr>
						<?php } }?>
					</table>
					
			</div>
			<div class="announcements">	
			<?php
				$sql = "SELECT * FROM announcements";
				$result = $conn->query($sql);
				if($result->num_rows == 0) {
					echo "No Announcements";
				}
				else {?>
					<table border="0">
					<caption><h3>Announcements</h3></caption>
						
						<?php while ($row = $result->fetch_assoc()) {?>
						
						<tr>
						<?php echo "<td>"."<a href=\"annshow.php?announcementid=".$row["AID"]."\">".$row["ATitle"]."</a></td>";?>
						</tr>
						
						<?php } }?>
					</table>
					
			</div>


		</div>
	</div>
</body>
</html>