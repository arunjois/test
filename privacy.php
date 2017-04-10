<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];

$query="CREATE TABLE PRIVACY(ID BIGINT UNSIGNED UNIQUE, STATUS TINYINT(1))";
$link->query($query);
$query="INSERT INTO PRIVACY VALUES($id,NULL)";
$link->query($query);
if(isset($_POST['submit']))
{
    $var=$_POST["privacy"];
    if($var==1)
    {
        $query="UPDATE PRIVACY SET STATUS=1 WHERE ID=$id";
        $link->query($query);
    }
    if($var==0)
    {
        $query="UPDATE PRIVACY SET STATUS=0 WHERE ID=$id";
        $link->query($query);
    }
}






?>
<html>
<head><title>Privacy.php</title>
<link rel="stylesheet" type="text/css" href="css/account_setting.css">
<style type="text/css">
    #user_space
    {
        position: absolute;
        top:200px;
        left:40px;
    }
    #privacy
    {
        position:relative;
        /*bottom:1px;*/
        padding: 3px;
    }
    label
    {
        font-family:sans-serif;
        font-size: 18px;
    }
    #btn{
        margin:10px;
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
<div class="middle">
<h1 id="fname"><?=$fname?>   <?=$lname;?></h1>
        <br /> <br/>
	<h2 style="margin:10px;" id="acc">Privacy</h2> <br /> <br />
<div id="user_space">
    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Access to my information is</label>
<select name="privacy" id="privacy">
<option value="0"> Denied </option>
<option value="1"> Allowed </option>
</select> <br /> <br />
    <button type="submit" id="btn" name="submit" value="1">Submit</button>
</form>
        </div>

</div>


</div>



</body>
</html>