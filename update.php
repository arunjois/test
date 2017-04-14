<?php
include'read_cookies.php';
if(isset($_GET['src']) && !isset($_GET['com']))
{
    $mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $pdir=$_GET['src'];
    $query="SELECT LIKES FROM post WHERE DIR='$pdir'";
    $result=$mysqli->query($query);
    $row=$result->fetch_row();
    $like=$row[0];
    $like++;
    $query="UPDATE post SET LIKES=$like WHERE DIR='$pdir'";
    $result=$mysqli->query($query);
}
if(isset($_GET['src']) && isset($_GET['com']) && isset($_GET['fname']))
{
    $mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $pdir=$_GET['src'];
    $com=$mysqli->real_escape_string($_GET['com']);
    $query="SELECT ID FROM post WHERE DIR='$pdir'";
    $result=$mysqli->query($query);
    $row=$result->fetch_row();
    $uid=$row[0];
    $query="CREATE TABLE c$uid(USER_ID BIGINT,FNAME VARCHAR(30),COMMENT TEXT)";
    $result=$mysqli->query($query);
    $query="INSERT INTO c$uid VALUES($id,'$fname','$com')";
    $result=$mysqli->query($query);
    
}


?>