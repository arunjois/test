<?php
include 'read_cookies.php';
/*
*I know that including every POST
*in the same database will delay the query.
*But creating a new directory for every college 
*is complicated. Creating a new directory with 
* all the permissions and user setting for server.
*/

if(isset($_POST['btn']))
{
$link = mysqli_connect("localhost:3306", "root", "root","$college");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="CREATE TABLE post(ID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,DIR VARCHAR(255),USER_ID BIGINT UNSIGNED,LIKES INT UNSIGNED) ";
$link->query($query);
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$name=implode($_FILES["image"]["name"]);

$query0="SELECT ID FROM post ORDER BY ID DESC LIMIT 1";
$data=$link->query("$query0");
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$row["ID"]==0?$id=0:$id=$row["ID"];
$id++;
$extension=substr($name,strpos($name,"."));
$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/images/'.$id;
$uploadfile = $uploaddir . $extension;
$user_id=$_COOKIE["ID"];
echo "<p>";
$temp=implode($_FILES["image"]['tmp_name']);
if (move_uploaded_file($temp, $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}
    $query="INSERT INTO post VALUES('$id','$uploadfile','$user_id',0)";
if($link->query($query))
    echo 'GOOD';

}
else
{
    $link = mysqli_connect("localhost:3306", "root", "root","login");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query0="SELECT ID FROM post ORDER BY ID DESC LIMIT 1";
    $data=$link->query("$query0");
    $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
    $id=$row["ID"];
    $id++;
    $text=$_POST['txt'];
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/images/'.$id;
    $extension=".txt";
    $uploadfile = $uploaddir . $extension;
    $handle = fopen($uploadfile, "w+");
    $dir=$uploadfile;       /*$uploaddir.$id.$extension;*/
$user_id=$_COOKIE["ID"];
$query="INSERT INTO post VALUES('$id','$dir','$user_id')";
    if(fwrite ( $handle , $text ) && $link->query($query))
        echo 'blog uploaded';
}

















?>