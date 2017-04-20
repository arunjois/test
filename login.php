<?php
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
//$mysqli = new mysqli("localhost:3306", "root", "root","login");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query="SELECT * FROM login WHERE email='$email' AND password='$password' AND status=1 AND profile=1";
    $r1= $link->query($query);
    $D=mysqli_fetch_array($r1,MYSQLI_ASSOC);
    $id=$D["ID"];
$query3="SELECT * FROM user WHERE id='$id'";
$r3=$link->query($query3);
$D1=mysqli_fetch_array($r3,MYSQLI_ASSOC);
$fname=$D1["fname"];
$lname=$D1["lname"];
$college=$D1["college"];
$course=$D1["course"];
$designation=$D1["Designation"];
$regno=$D1["RegNo"];
$year=$D1["Year"];
$sex=$D1["Sex"];

    if($r1->num_rows==1)
    {
        
        setcookie("Email","$email");
        setcookie("ID","$id");
        setcookie("fname","$fname");
        setcookie("lname","$lname");
        setcookie("college","$college");
        setcookie("course","$course");
        setcookie("designation","$designation");
        setcookie("regno","$regno");
        setcookie("year",$year);
        setcookie("sex",$sex);
        $url="Location:http://$localIP/test/wall.php";
        header ($url);        
        exit();
    
    }
    $query1="SELECT * FROM login WHERE email='$email' AND password='$password' AND profile=0";
    $r2=$link->query($query1);
$row=$r2->fetch_assoc();
$id=$row["ID"];
$query0="SELECT * from user where Designation='Student' AND ID=$id ";
$som=$link->query($query0);
    if($r2->num_rows==1)
    {
        if($som->num_rows==1)
        {
            $url="Location:http://$localIP/test/profiles.php?email=$email";
            header($url);
            exit();            
        }
        else {
            $url="Location:http://$localIP/test/profile.php?email=$email";
            header ($url);
        exit();
        }
        
        
    }
$query1="SELECT * FROM login WHERE email='$email' AND password='$password' AND status=0";
$r2=$link->query($query1);
$row=$r2->fetch_assoc();
$id=$row["ID"];
if($r2->num_rows==1)
{
    $url="Location:http://$localIP/test/invalid_email.php";
    header ($url); 
}
    else 
    {
        $url="Location:http://$localIP/test/fail.php";
        header ($url);
        exit();
        
    }
?>
