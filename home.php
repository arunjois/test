<?php
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$firstname = $link->real_escape_string($_POST["fname"]);
$lastname = $link->real_escape_string($_POST["lname"]);
$email = $link->real_escape_string($_POST["email"]);
$cpassword = $link->real_escape_string(md5($_POST["cpassword"]));
$college =$link->real_escape_string( $_POST["college"]);
$course = $link->real_escape_string($_POST["course"]);
$des = $link->real_escape_string($_POST["desig"]);
$id=$link->real_escape_string(mt_rand());

/*
function check_id(){
$resuslt=mysql_query("SELECT id from user where id=$id");
$check=mysql_num_rows ($result);
if ($check>0)
{
getnew_id($id);
checkid();
}
else
{
return 0;
}

function getnew_id($id){
    return $id=mtrand(0, mt_getrandmax());
    }

*/

$query2="CREATE TABLE login (ID BIGINT UNSIGNED NOT NULL PRIMARY KEY,email char(30), password char(32),status BOOLEAN,profile BOOLEAN);";
$link->query($query2);

$query3="CREATE TABLE user(ID BIGINT UNSIGNED NOT NULL PRIMARY KEY,fname varchar(30),lname varchar(30),college varchar(30),course varchar(30),Sex char(8),RegNo char(20),Designation varchar(10),Year int);";
$link->query($query3);

//$r4=mysqli_query($link, "USE login");
$query4="INSERT INTO login VALUES ($id,'$email','$cpassword',0,0);";
$link->query($query4);


$query5="INSERT INTO user VALUES ($id,'$firstname','$lastname','$college','$course','','','$des','');";
$link->query($query5);
$temp="Please visit following link http://192.168.1.105/test/confirm.php?email=$email";
$message =  $temp;
  

mail($email,'For Email Confirmation',$message);
$query="SELECT ID from login where email='$email'"; 
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$id=$row["ID"];
$source=$_SERVER['DOCUMENT_ROOT']."/dp/dp.png";
$dest="./dp/".$id.".png";
copy ($source , $dest );
$query="CREATE TABLE DP(DIR VARCHAR(255),USER_ID BIGINT UNSIGNED PRIMARY KEY)";
$link->query($query);
$dest="./dp/".$id.".png";
$query="INSERT INTO DP VALUES('$dest','$id')";
$link->query($query);



include 'home-foot.php';

mysqli_close($link);

?>

