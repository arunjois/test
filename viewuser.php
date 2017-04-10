<?php
include 'read_cookies.php';
$mysqli = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$mysqli->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];

$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$mysqli->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$u_dir=$row["DIR"];


$link = mysqli_connect("localhost:3306", "root", "root","$college");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$u_id=$_GET["id"];
$query="SELECT * FROM user WHERE ID=$u_id";
$result=$mysqli->query($query);
$row=$result->fetch_row();
$u_fname=$row[1];
$u_lname=$row[2];
$u_college=$row[3];
$u_course=$row[4];
$u_desig=$row[7];
$u_sex=$row[5];
$u_year=$row[8];

$query="SELECT * FROM student WHERE course='$course' AND year='$year'";
$result=$link->query($query);
mysqli_num_rows( $result )==0 ? $u_num=0 : $u_num=mysqli_num_rows( $result);
$query="SELECT * FROM teacher WHERE course='$course'";
$result=$link->query($query);
$u_num+=mysqli_num_rows( $result );

$query="SELECT STATUS FROM PRIVACY WHERE ID=$u_id";
$result=$mysqli->query($query);
$row=$result->fetch_row();
$access=$row[0];


?>
<html>
<head>
<title><?=$fname?></title>    
    <style type="text/css">
    .container
{
	width=100%;
	height=99%;
}
#img{
    border-radius: 10px;
    width: 180px;
    height: 180px;
    margin: 10px;
    position:absolute;
    top:10px;
    left: 10px;
}
#nav{
    position: absolute; 
    top:200px;
}
a{
    color:white;
    text-decoration: none;
    margin:20px;
    font-family: sans-serif;
}
h1
{
    color:white;
    margin: 10px;
}
body
{
    background-color:white;
}
.left
{
    margin:3px;
    background-color: orangered;
    width: 210px;
    height: 99%;
    border-radius: 10px;
}
.middle
{
    width:1070px;
    height:655px;
    background-color: orangered;
    border-radius: 10px;
    position: absolute;
    left:230px;
    top:10px;
    color:white;    
    font-family: sans-serif;
}
#fname
{
    position: absolute;
    top:10px;
    left:40px;
    margin:10px;
    font-family: sans-serif;
}
#acc
{
    position: absolute;
    top:100px;
    left:40px;
    margin: 10px;
    font-family: sans-serif;
}
label
{
    font-family: sans-serif;
    margin:10px;
    float:left;
}
input
{
    margin: 10px;
    float:right;
}
#data
{
    position: absolute;
    top:200px;
    left:70px;
    
}
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
        <div id="img" style="background: url(<?=$dir?>);background-size: 100% 100%;"></div>    
         <div id="nav">
              <h2><a href="userprofile.php">Profile</a></h2>
              <h2><a href="account_setting.php">Account Setting</a></h2>
              <h2><a href="privacy.php">Privacy</a></h2>
               <h2><a href="#">Notifications</a></h2>
               <h2><a href="wall.php">Wall</a></h2>
	</div>
        </div>   
    <div class="middle">
        <div id="img" style="background: url(<?=$u_dir;?>);background-size: 100% 100%;"></div>
    <div id="name"><h1><?=$fname;echo " ".$lname?></h1></div>
<div class="info"
     <?php
if(!$access==1)
    echo "style='display:none'";?>
     >
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
        <label><?=$u_num;?></label><br />
    </div>
    
    </div>  
    
    </div>
    

    
</body>

</html>
