<?php
include 'read_cookies.php';
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query="SELECT DIR FROM DP WHERE USER_ID=$id";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];
$DIR=substr($dir,strpos($dir,"dp/"));
unlink("/opt/lampp/htdocs/test/".$DIR);

define ('SITE_ROOT', realpath(dirname(__FILE__)));
$image=implode($_FILES["dp"]["name"]);
$user_id=$_COOKIE["ID"];
$extension=substr($image,strpos($image,"."));
$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/dp/'.$user_id;
$uploadfile = $uploaddir . $extension;
$temp=implode($_FILES["dp"]['tmp_name']);
if (move_uploaded_file($temp, $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
    $dir="../../dp/".$id.$extension;
    $query="UPDATE DP SET DIR='$dir' WHERE USER_ID='$id'";
    $link->query($query);
    header("Location:http://".$localIP."/test/userprofile.php");
} else {
   echo "Upload failed";
}
?>
