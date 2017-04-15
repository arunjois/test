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
if(isset($_GET['msg']) && isset($_GET['sess']))
{
    $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    $msg=$link->real_escape_string($_GET['msg']);
    $sess=$link->real_escape_string($_GET['sess']);
    $query="CREATE TABLE chat(ID BIGINT PRIMARY KEY AUTO_INCREMENT,SESSION CHAR(11),LINE TEXT,USER_ID BIGINT)";  
    $mysqli->query($query);
    $query="INSERT INTO chat VALUES(0,'$sess','$msg',$id)";
    $mysqli->query($query);
    echo $msg;
}

if(isset($_GET['sess']) && !isset($_GET['msg']))
{
    $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    $sess=$mysqli->real_escape_string($_GET['sess']);
    $query="SELECT * FROM chat";
    $result=$mysqli->query($query);
    $row=$result->fetch_row();
    $txt=$row[2];
    echo $txt;
}


?>
