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
    function get_msg($b,$i)
    {
        include 'read_cookies.php';
        $mysqli=mysqli_connect("localhost:3306", "root", "root",$college);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $R=$mysqli->real_escape_string($b);
        $query="SELECT LINE FROM chat WHERE USER_ID=$R AND R=$id  ORDER BY ID DESC LIMIT 1";
        $result=$mysqli->query($query);
        $num=mysqli_num_rows($result);
        $result->data_seek($i);
        $row=$result->fetch_row();
        $txt=$row[0];
        return $txt;
        
    
    }
    $R=$mysqli->real_escape_string($_GET['R']);
    $query="SELECT * FROM chat WHERE USER_ID=$R AND R=$id  ORDER BY ID DESC LIMIT 1";
    $result=$mysqli->query($query);
    $num=mysqli_num_rows($result);
    for($i=0;$i<$num;$i++)
    {
        $data=get_msg($_GET['R'],$i);
        echo $data;
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