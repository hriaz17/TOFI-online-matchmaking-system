<?php
$pageTitle = 'Home';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$password = $_POST["passwords"];
	$conn = mysqli_connect("localhost", "root","", "relationshipdb");
    if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
    }
    $sql = ("SELECT * FROM users WHERE Fname='$fname' AND Lname='$lname' AND passwords='$password';");
    if ($data = mysqli_query($conn,$sql))
    {
    	$row = mysqli_fetch_array($data);
    	if ($row)
    	{
    		echo 'Success!';
    		setcookie("userfname",$fname,time()+3600,"/","",0);
  			setcookie("userlname",$lname,time()+3600,"/","",0);
  			setcookie("userid",$row['user_id'],time()+3600,"/","",0);
  			header("Refresh:0");
    	}
    	else
    		echo "<script>alert('Invalid username/password!')</script>";

    }
    else
    {
    	echo 'Fail!';
    }
}
include('inc/header.php');
?>
		<div id="main">
			<div id="main-logo">
				<!--<img src="img/logo.png">-->
				<h1 style="color:maroon">T O F I</h1>
				<h1>Online Matchmaking System</h1>
			</div>
		</div>
		<?php if (!isset($_COOKIE['userfname'])) {?>
		<div class="container maroon">
			<h2>Login</h2>
			<p>
				<form method="post">
				<p><label>First Name: </label><input name="fname" type="text"></p>
				<p><label>Last Name: </label><input name="lname" type="text"></p>
				<p><label>Password: </label><input name="passwords" type="password"></p>
				<p><input type="submit" value="Login"></p>
				</form>
			</p>
		</div>
		<?php } else { ?>
		<div class="container purple">
		<h2>Welcome, <?php echo $_COOKIE['userfname'];?>!</h2>
		</div>
		<div class="container maroon">
			<h2>Matches</h2>
			<?php
				$userid = $_COOKIE['userid'];
				$conn = mysqli_connect("localhost", "root","", "relationshipdb");
			    if (!$conn) {
			    	die("Connection failed: " . mysqli_connect_error());
			    }
			    $sql = ("SELECT * FROM matches JOIN users ON user2_id=user_id WHERE user1_id=$userid;");
			    
			    $data = mysqli_query($conn,$sql);
			    while($row = mysqli_fetch_array($data,MYSQLI_ASSOC))
			    {
			    	echo "<div id='directorate-container'><div>";

			    	if ($row != NULL)
			    	{
			    		$matchname = $row['FName'] .  ' ' . $row['LName'];
			    		$matchid = $row['user_id'];
			    		echo "<div><h2><a href='profile.php?user_id=$matchid'><img src='img/team/aziz_ullah.jpg'><br><br>$matchname</a></h2></div>";
			    	}
			    	else
			    	{
			    		echo "<p>No matches found!</p>";
			    	}
			    	echo "</div></div>";

			    }
			    	echo "</div></div>";
			    
			    
			?>
		</div>
		<div class="container purple">
			<h2>Hangout History</h2>
			<?php
			$userid = $_COOKIE['userid'];
			$conn = mysqli_connect("localhost", "root","", "relationshipdb");
		    if (!$conn) {
		    	die("Connection failed: " . mysqli_connect_error());
		    }
		    $sql = ("SELECT * FROM hangout JOIN users ON participant_2=user_id WHERE participant_1=$userid;");
		    $data = mysqli_query($conn,$sql);
		    $row = mysqli_fetch_array($data,MYSQLI_ASSOC);
		    if ($row != NULL)
		    {
		    	$count = 1;
		    	echo "<table>";
		    	echo "<tr><th></th><th>Location</th><th>Date</th><th>User</th></tr>";
		    	$place = $row['place_name'];
		    	$date = $row['hangout_date'];
		    	$name = $row['FName'] .  ' ' . $row['LName'];
		    	echo "<tr><td>$count</td><td>$place</td><td>$date</td><td>$name</td></tr>";
		    	$count++;
		    	while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC))
		    	{
		    		$place = $row['place_name'];
		    		$date = $row['hangout_date'];
		    		$name = $row['FName'] . ' ' . $row['LName'];
		    		echo "<tr><td>$count</td><td>$place</td><td>$date</td><td>$name</td></tr>";
		    		$count++;
		    	}
		    	echo "</table>";
		    }
		    else
		    {
		    	echo "<p>No hangouts found!</p>";
		    }
			?>
		</div>
		<div id="footer">
		<h4 style="text-align: right"><a style="text-decoration: none;color:orange" href="logout.php">Log out</a></h4>
		</div>
		<?php } ?>
<?php include('inc/footer.php');?>