<?php
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$email= $link->real_escape_string($_POST["email"]);
$reg=$link->real_escape_string($_POST["reg"]);
$year=$link->real_escape_string($_POST["year"]);
$sex=$link->real_escape_string($_POST["sex"]);
$query1="SELECT * from login,user where email='$email'";
$result=$link->query($query1);
$row=$result->fetch_array(MYSQLI_NUM);
$id=$row[0];
$college=$row[8];
$course=$row[9];
$query="UPDATE user SET sex='$sex',RegNo='$reg',Year='$year' where id=$id";
if($link->query($query))
{   
    $query="CREATE DATABASE $college";
    $link->query($query);
    $query="USE $college";
    $link->query($query);
    $mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        
    }
    $string="CREATE TABLE student(ID int UNIQUE, RegNo char(20),course char(10),year int)";
    $mysqli->query($string);
    $string="CREATE TABLE teacher(ID int UNIQUE, RegNo char(20),course char(10))";
    $mysqli->query($string);
    $string="INSERT INTO student VALUES(0,0,0,0)";
    $mysqli->query($string);
    $string="INSERT INTO teacher VALUES(0,0,0)";
    $mysqli->query($string);
    $string="INSERT INTO student values($id,'$reg','$course',$year)";
    $mysqli->query($string);
    echo '<b>Processing Data </b>';
    $url="refresh:3;url=http://$localIP/test/index.php";
    header( $url);
}


?>

<html>
<body bgcolor="yellow"><h1>Please LOGIN AGAIN......</h1>
    <br />
    <h2>WAIT FOR IT!....</h2>    
    </body>
</html>