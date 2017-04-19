<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*
The main message here is there seems to be a
problem regarding new user's dp pics.....
*/



$query="SELECT * FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];
//$num=23;
//$dir="./test/dp/1931561170.CR2";
$link = mysqli_connect("localhost:3306", "root", "root","$college");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*
EDITING NEEDED HERE  I need to 
if(desig==studnet)
    select * from student where course='$course' and year='$year'
    is not good for teachers
else
    //do something else

*/
$query="SELECT * FROM student WHERE course='$course' AND year='$year'";
$result=$link->query($query);
mysqli_num_rows( $result )==0 ? $num=0 : $num=mysqli_num_rows( $result);
$query="SELECT * FROM teacher WHERE course='$course'";
$result=$link->query($query);
$num+=mysqli_num_rows( $result );


?>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="css/account_setting.css">
<style type="text/css">
    #name
    {
        position: absolute;
        top:60px;
        left:250px;
    }
    .info{
        border: 10px;
        margin: 10px;
        padding: 10px;
        font-size: 20px;
        font-family: sans-serif;
        align-content: center;
        position: absolute;
        top: 250px;
        left:10px;
        float:none;
    }
    #left{
        float:left;
    }
    .right{
        position: relative;
        top:0px;
        left: 500px;
        float:right;
    }
    </style>
    </head>
<body>
<div class="container">
<div class="left">
        <div id="img" style="background: url(<?=$dir;?>);background-size: 100% 100%;"></div>    
         <div id="nav">
              <h2><a href="userprofile.php">Profile</a></h2>
              <h2><a href="account_setting.php">Account Setting</a></h2>
              <h2><a href="privacy.php">Privacy</a></h2>
               <h2><a href="wall.php">Wall</a></h2>
	</div>
<div class="middle">
    <div id="img" style="background: url(<?=$dir;?>);background-size: 100% 100%;"></div>
    <div id="name"><h1><?=$fname;echo " ".$lname?></h1></div>
<div class="info">
    <div id="left">
    <label>College:</label>
    <label><?=$college;?></label> <br />
    <label>Course:</label>
    <label><?=$course;?></label> <br />
    <label>Year:</label>
    <label><?=$year;?></label>
    </div>
    <div class="right">
    <label>Designation:</label>
    <label><?=$desig;?></label><br />
    <label>Gender:</label>
        <label><?=$sex?></label><br />
    <label>Friends</label>
        <label><?=$num;?></label><br />
    </div>
    
    </div>    
</div>
</body>
</html>
