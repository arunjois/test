<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","$college");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$mysqli = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}    
$num=0;
$tnum=0;
if($desig=="Student")
{
    $query="SELECT ID FROM student WHERE course='$course' AND year=$year";
    $result=$link->query($query);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$num;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $S_ID[$i]=$row[0];
        }   
    }
    $query="SELECT ID FROM teacher WHERE course='$course'";
    $result=$link->query($query);
    $tnum+=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$tnum;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $T_ID[$i]=$row[0];
        }   
    }
}
else if($desig=="Teacher")
{
    $query="SELECT ID FROM student WHERE course='$course'";
    $result=$link->query($query);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$num;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $S_ID[$i]=$row[0];
        }   
    }
    $query="SELECT ID FROM teacher";
    $result=$link->query($query);
    $tnum+=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$tnum;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $T_ID[$i]=$row[0];
        }   
    }
    
}
else if($desig=="Principal")
{
    $query="SELECT ID FROM student";
    $result=$link->query($query);
    $num+=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$num;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $S_ID[$i]=$row[0];
        }   
    }   

    $query="SELECT ID FROM teacher";
    $result=$link->query($query);
    $tnum+=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<=$tnum;$i++)
        {
            $result->data_seek($i);
            $row=$result->fetch_row();
            $T_ID[$i]=$row[0];
        }   
    }
}



?>
<html>
<head>
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
    overflow-y:scroll;
}
.left
{
    margin:3px;
    background-color: #32127A;
    width: 210px;
    height: 99%;
    border-radius: 10px;
    display:none;
}
.middle
{
    width:100%;
    height:100%;
    background-color: #32127A;
    border-radius: 10px;
    position: absolute;
    /*left:230px;
    top:10px;*/
    color:white;    
    font-family: sans-serif;
    padding: 10px;
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
               <h2><a href="wall.php">Wall</a></h2>
	</div>
        </div>
        <div class="middle">
        <h1>Groups</h1>
            <?php
    //$i=0;
    
    for($i=0;$i<$num-1;$i++)
    { 
    $query="SELECT fname FROM user WHERE ID=$S_ID[$i]";
    $result=$mysqli->query($query);
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
    $fname=$row[0];
    echo "<br ><a href=\"viewuser.php?id=$S_ID[$i]\">$fname</a><br >";
    }
     for($i=0;$i<$num-1;$i++)
    { 
    $query="SELECT fname FROM user WHERE ID=$T_ID[$i]";
    $result=$mysqli->query($query);
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
    $fname=$row[0];
    echo "<br><a href=\"viewuser.php?id=$T_ID[$i]\">$fname</a><br >";    
    //$i++;
    }   
            ?>
            
        </div>
    
    
    </body>


</html>
