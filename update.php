<?php
include'read_cookies.php';
if(isset($_GET['src']))
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



?>