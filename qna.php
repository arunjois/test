<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="CREATE TABLE qna(ID BIGINT UNSIGNED NOT NULL,QID BIGINT UNSIGNED NOT NULL)";
$mysqli->query($query);
    
    
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];




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
#form
        {
            position: absolute;
            left:280px;
            align-content: center;
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
}
#data
{
    position: absolute;
    top:200px;
    left:70px;
    
}
#tit
        {
            position: relative;
            left:10px;
        }
textarea
{
    width: 300px;    
    height: 100px;
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
            <div class="middle">
            <h1>Ask Your Question!....</h1>
            <br />
                <div id="form">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <label id="tit">Title</label>
                <input type="text" name="title" > <br /><br />
                <label>Question</label>
                <textarea name="ques"></textarea>
                <input type="submit" name="submit" />
                        </form> 
                    </div>
            </div>
    
    </body>
</html>