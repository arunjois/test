<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT * FROM user WHERE course='$course' AND college='$college' AND ID!=$id LIMIT 7";
$result=$link->query($query);
$row=$result->fetch_row();
$num=mysqli_num_rows($result);
function generateRandomString($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$str=generateRandomString();
if($num>0)
{
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $uid=$row[0];
        $ufname=$row[1];
        echo "<br><a href='message.php?id=$uid&sess=$str'>$ufname</a><br>";
        
    }
}
?>