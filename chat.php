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
$query="CREATE TABLE chat(ID BIGINT PRIMARY KEY AUTO_INCREMENT,FNAME VARCHAR(30),LINE TEXT,USER_ID BIGINT,R BIGINT)";
$mysqli->query($query);
if(isset($_GET['msg']) && isset($_GET['R']))
{
    $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    $msg=$link->real_escape_string($_GET['msg']);
    $toid=$link->real_escape_string($_GET['R']);
    $query="CREATE TABLE chat(ID BIGINT PRIMARY KEY AUTO_INCREMENT,FNAME VARCHAR(30),LINE TEXT,USER_ID BIGINT,R BIGINT)";
    $mysqli->query($query);
    $query="INSERT INTO chat VALUES(0,'$fname','$msg',$id,$toid)";
    $mysqli->query($query);
    //echo $msg;
}

if(!isset($_GET['msg']) && isset($_GET['R']))
{
    $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    $R=$mysqli->real_escape_string($_GET['R']);
    $query="SELECT * FROM chat WHERE USER_ID=$R AND R=$id";
    $result=$mysqli->query($query);
    $num=mysqli_num_rows($result);
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $txt=$row[2];
        echo $txt;
    }
}
/*if(isset($_GET['msg']) && !isset($_GET['R']))
{
    $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    $R=$mysqli->real_escape_string($_GET['R']);
    $query="SELECT * FROM chat WHERE USER_ID=$id AND R=$R";
    $result=$mysqli->query($query);
    $num=mysqli_num_rows($result);
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $txt=$row[3];
        echo $txt;
    }
}*/



?>