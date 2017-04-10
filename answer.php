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
function generateRandomString($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$qid=generateRandomString();


if(isset($_POST['submit']))
{
    $question=$link->real_escape_string($_POST["ques"]);
    $query="CREATE TABLE qna(USER_ID BIGINT UNSIGNED,QID varchar(30),COURSE varchar(30),FNAME varchar(30),YEAR INT)";
    $mysqli->query($query);
    $query="CREATE TABLE $qid (ID BIGINT UNSIGNED,QUESTION TEXT,USER_ID BIGINT UNSIGNED,FNAME varchar(30))";
    $mysqli->query($query);
    
    $query="INSERT INTO qna VALUES($id,'$qid','$course','$fname',$year)";
    $mysqli->query($query);
    
    $query="INSERT INTO $qid VALUES(0,'',0,'')";
    $mysqli->query($query);
    
    
    
    $query="SELECT ID FROM $qid ORDER BY ID DESC LIMIT 1";
    $data=$mysqli->query("$query");
    $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
    $row["ID"]==0?$ID=0:$ID=$row["ID"];
    $ID++;
    
    $query="INSERT INTO $qid VALUES($ID,'$question',$id,'$fname')";
    $mysqli->query($query);
    
    
    
    
    
    
    
}
    
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
#form
        {
            position: absolute;
            left:40px;
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
    width: 400px;    
    height: 200px;
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
<?php
$query="SELECT * FROM qna WHERE COURSE='$course' AND YEAR=$year";
$result=$mysqli->query($query);
$num=mysqli_num_rows($result);
    if($num>0)
    {
        for($i=0;$i<$num;$i++)
        {
            $QID[$i]=0;
            $result->data_seek($i);
            $row=$result->fetch_row();
            $temp=$row[1];
            $QID[$i]=$temp;
            $QID[$i]=$temp;
            $u_fname=$row[3];
            $str="SELECT CAST(QUESTION AS CHAR(50) CHARACTER SET utf8) FROM ".$QID[$i];
            $data=$mysqli->query($str);
            $tmp=$data->fetch_row();
            //$string=$tmp[0];
            echo "<br />$u_fname <a href=\"que_ans.php?qid=$QID[$i]\">$i</a><br />";
        }   
    }            
?>
            
            </div>

</html>
