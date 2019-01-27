<?php
$pageTitle = 'My Profile';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$firstname = $_POST["firstname"];
	$middleinit = $_POST["middleinit"];
	$lastname = $_POST["lastname"];
	$dob = $_POST["dob"];
	$userid = $_COOKIE["userid"];
	$haircolor = $_POST["haircolor"];
	$skincolor = $_POST["skincolor"];
	$gender = $_POST["gender"];
	$activity1 = $_POST["activity1"];
	$activity2 = $_POST["activity2"];
	$activity3 = $_POST["activity3"];
	$activity4 = $_POST["activity4"];
	$activity5 = $_POST["activity5"];

	$conn = mysqli_connect("localhost", "root","", "relationshipdb");
    if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
    }
    $sql = ("UPDATE users SET FName='$firstname',Minit='$middleinit',LName='$lastname',DOB='$dob' WHERE user_id=$userid;");
    mysqli_query($conn,$sql) or die(mysqli_connect_error());
    $sql = ("UPDATE preferences SET hair_color='$haircolor',skin_color='$skincolor',gender='$gender' WHERE user_id=$userid;");
    mysqli_query($conn,$sql) 
    or die(mysqli_connect_error());
    $sql = "INSERT INTO activity VALUES (0,'$activity1');";
	mysqli_query($conn,$sql) or die(mysqli_connect_error());
	$sql = "INSERT INTO activity VALUES (0,'$activity2');";
	mysqli_query($conn,$sql) or die(mysqli_connect_error());
	$sql = "INSERT INTO activity VALUES (0,'$activity3');";
	mysqli_query($conn,$sql) or die(mysqli_connect_error());
	$sql = "INSERT INTO activity VALUES (0,'$activity4');";
	mysqli_query($conn,$sql) or die(mysqli_connect_error());
	$sql = "INSERT INTO activity VALUES (0,'$activity5');";
	$sql = "SELECT * FROM activity WHERE activity_name = '$activity1'";
	$data = mysqli_query($conn,$sql) or die(mysqli_connect_error());
	$row = mysqli_fetch_array($data);
	$act1id = $row['activity_no'];
	$sql = "INSERT INTO involved_in VALUES ($act1id,$userid);";
}
include('inc/header.php');
?>
		<div class="container purple">
			<br/><br/>
			<h2>My Profile</h2>
		</div>
		<?php if (!isset($_COOKIE['userfname'])) {?>
		<div class="container maroon" style="text-align: center">
			<h2>You need to be logged in to access this page!</h2>
			<a class="login-button" href="index.php">Login</a>
		</div>
		<?php } else { ?>
		<div class="container maroon">
			<h2>Edit My Information</h2>
			<p>
				<form method="post">
				<?php
					$conn = mysqli_connect("localhost", "root","", "relationshipdb");
   					if (!$conn) {
    					die("Connection failed: " . mysqli_connect_error());
   					}
   					$userid = $_COOKIE["userid"];
   					$sql = "SELECT * FROM users WHERE user_id=$userid;"; 
   					$data = mysqli_query($conn,$sql) or die(mysqli_connect_error());
   					$personal = mysqli_fetch_array($data);
   					$firstname = $personal['FName'];
   					$middleinit = $personal['Minit'];
   					$lastname = $personal['LName'];
   					$dob = $personal['DOB'];
   					$sql = "SELECT * FROM preferences WHERE user_id=$userid;";
   					$data = mysqli_query($conn,$sql) or die(mysqli_connect_error()); 
   					$pref = mysqli_fetch_array($data);
   					$haircolor = $pref['hair_color'];
   					$skincolor = $pref['skin_color'];
   					$gender = $pref['gender'];
   					$sql = "SELECT * FROM activity NATURAL JOIN involved_in WHERE user_id=$userid;";
   					$data = mysqli_query($conn,$sql) or die(mysqli_connect_error()); 
   					$activities = mysqli_fetch_array($data);
   					$activity1 = $activities['activity_name'];
   					$activities = mysqli_fetch_array($data);
   					$activity2 = $activities['activity_name'];
   					$activities = mysqli_fetch_array($data);
   					$activity3 = $activities['activity_name'];
   					$activities = mysqli_fetch_array($data);
   					$activity4 = $activities['activity_name'];
   					$activities = mysqli_fetch_array($data);
   					$activity5 = $activities['activity_name'];

				?>
					<h3>Personal Details</h3>
					<table>
					<tr><td><label>First Name: </label></td><td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td></tr>
					<tr><td><label>Middle Initial: </label></td><td><input type="text" maxlength="1" name="middleinit" value="<?php echo $middleinit;?>"></td></tr>
					<tr><td><label>Last Name: </label></td><td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td></tr>
					<tr><td><label>Date of Birth: </label></td><td><input type="date" name="dob" value="<?php echo $dob;?>"></td></tr>
					</table>
					<h3>Preferences</h3>
					<table>
					<tr><td><label>Hair Color: </label></td><td><select name="haircolor" selected="<?php echo $haircolor;?>"><option value="black">Black</option><option value="brown">Brown</option><option value="blonde">Blonde</option><option value="red">Red</option></select></td></tr>
					<tr><td><label>Skin Color: </label></td><td><select name="skincolor" selected="<?php echo $skincolor;?>"><option value="black">Black</option><option value="brown">Brown</option><option value="white">White</option></select></td></tr>
					<tr><td><label>Gender: </label></td><td><select name="gender" selected="<?php echo $gender;?>"><option value="M">Male</option><option value="F">Female</option><option value="O">Other</option></select></td></tr>
					</table>
					<h3>Activities</h3>
					<table>
					<tr><td><label>Activity 1: </label></td><td><input type="text" name="activity1" value="<?php echo $activity1;?>"></td></tr>
					<tr><td><label>Activity 2: </label></td><td><input type="text" name="activity2" value="<?php echo $activity2;?>"></td></tr>
					<tr><td><label>Activity 3: </label></td><td><input type="text" name="activity3" value="<?php echo $activity3;?>"></td></tr>
					<tr><td><label>Activity 4: </label></td><td><input type="text" name="activity4" value="<?php echo $activity4;?>"></td></tr>
					<tr><td><label>Activity 5: </label></td><td><input type="text" name="activity5" value="<?php echo $activity5;?>"></td></tr>
					</table>
					<p><input type="submit" value="Done"></p>
				</form>
			</p>
		</div>

		<?php } ?>
<?php include('inc/footer.php');?>