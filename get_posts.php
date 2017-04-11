<?php
include 'ip.php';
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
function find($ext)
{
    $link = mysqli_connect("localhost:3306", "root", "root","login");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }  
    $query="SELECT * FROM EXTENSION WHERE EXT='$ext'";
    $result=$link->query($query);
    $row=$result->fetch_row();
    $type=$row[1];
    return $type;    
    
}
function display($type,$dir,$uid,$like,$exten)
{
    if($type=="video")
    {
        echo "<video width='320' height='240' controls>
              <source src='$dir' type='video/$exten'>
              </video>";
    }
    if($type=="image")
    {
        echo "<br /><img width='320' height='240' src='$dir'></img>";
    }
    if($type=="file")
    {
        $handle = fopen($dir, "r+"); 
        if ($handle) {
        while (($line = fgets($handle)) !== false) {
            echo $line."<br />";
            }   
        }
    }
    if($type=='audio')
    {
        echo "<audio controls><source src='$dir' type='audio/$exten'></audio>";
    }
}


$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year";
$result=$mysqli->query("$query");
$num=mysqli_num_rows($result);
if($num>0)
{
     for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $pid=$row[0];
        $pdir=$row[1];
        $puid=$row[2];
        $like=$row[3];
        $str=strrev($pdir); 
        $j=strpos($str,".");
        $exten=substr($pdir,-$j) ;
        $type=find($exten);
        display($type,$pdir,$puid,$like,$exten); 
    }
    
}
?>
