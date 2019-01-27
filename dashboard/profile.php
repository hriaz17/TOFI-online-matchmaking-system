<?php  
 $connect = new mysqli("localhost", "root", "", "relationshipdb") or die("Unable to connect to relationshipdb database.....");
 $user = $_GET['user_id'];
 ?> 


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Live Material Design User Widget</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/profile.css">

  <style>
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
</style>
</head>

<body>
  <!-- Card widget -->
<div class="card" style = "width: 75%; height: 100%;"><!-- Face 2 -->
 <!-- Face 1 -->
  <div class="card-face face-1"><!-- Menu trigger -->
    <!-- Avatar -->
    <div class="card-face__avatar"><!-- Bullet notification -->
      <!-- User avatar -->
       <!-- PHP code to get image of user from DBS-->
      <?php  
                $query = "SELECT image FROM profile_pictures where user_id =".$user;  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" />';  
                }  
      ?>
    </div>
    <!-- Name -->
    <?php
        $query1 = "SELECT * FROM users where user_id =".$user;
        $result1 = mysqli_query($connect, $query1);  
        while($row1 = mysqli_fetch_array($result1))  
        {  
            $fname = $row1['FName'];
            $minit = $row1['Minit'];
            $lname = $row1['LName'];  
        } 
        $query2 = "SELECT * FROM attributes where user_id =".$user;
        $result2 = mysqli_query($connect, $query2);  
        while($row2 = mysqli_fetch_array($result2))  
        {  
            $gender = $row2['sex'];
            $height = $row2['height'];
            $eth = $row2['ethnicity'];
            $job = $row2['job_type'];
            $edu = $row2['education'];
            $company = $row2['company'];  
        } 

        // Name
        echo '<h2 class="card-face__name">'.$fname.' '.$minit.' '.$lname.'</h2>';
        
        //Title & details

        echo '<span class="card-face__title">'.$job.'@'.$company.'</span>';

        echo '<p class = card-face__title><b>Attributes: '.$height.', '.$gender.', '.$eth.'</b> </p>';

        $query3 = "SELECT * FROM preferences where user_id =".$user; ;
        $result3 = mysqli_query($connect, $query3);  
        while($row3 = mysqli_fetch_array($result3))  
        {  
            $hair_color = $row3['hair_color'];
            $skin_color = $row3['skin_color'];
            $pref_gender = $row3['gender'];
        } 
        echo '<p class = card-face__title><b>Preferences: '.$hair_color.' hair color, '.$skin_color.' skin color, '.$gender.' gender</b></p>';

        $query4 = "SELECT * FROM activity where activity.activity_no in(select activity_no from involved_in where user_id =".$user.")";
        $result4 = mysqli_query($connect, $query4);  
        echo '<p class = card-face__title><b>Activities: ';
        while($row4 = mysqli_fetch_array($result4))  
        {  
            $hobby = $row4['activity_name'];
            echo $hobby.', ';
        } 
        echo '</b></p>';

    ?>

    <!-- Cart Footer -->
    <div class="card-face-footer">
      <input type="button" class="button" value="Send a Message">
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/profile.js"></script>

</body>
</html>
