<?php
include 'ip.php';
//$email=$_GET["email"];
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$email = $link->real_escape_string($_GET["email"]);
//echo $email;
$query="UPDATE login SET status=1 WHERE email='$email'";
if($link->query($query))
{   
    echo 'Confirmation successful';
    $url="refresh:3;url=http://$localIP/index.php";
    header( $url );
}
else
    echo 'Confirmation UNSUCCESSFUL';


mysqli_close($link);


?>
<html>
<body bgcolor="yellow"></body>
</html>