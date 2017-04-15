<?php
include 'read_cookies.php';
//include 'message.php';
$toid=1591900390;
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
    $query="CREATE TABLE chat(ID BIGINT PRIMARY KEY AUTO_INCREMENT,FNAME VARCHAR(30),SESSION CHAR(17),LINE TEXT,USER_ID BIGINT,R BIGINT)";  
    $mysqli->query($query);
    $query="INSERT INTO chat VALUES(0,'$fname','$sess','$msg',$id,$toid)";
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
    //mysqli_num_rows($result)==0:$num=0?$num=mysqli_num_rows($result);
    //$num=mysqli_num_rows($result);
    if(mysqli_num_rows($result))
        $num=1;
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $txt=$row[3];
        echo $txt;
    }

}


?>
