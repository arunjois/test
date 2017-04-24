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
function display($type,$dir,$uid,$like,$exten,$i)
{
    if($type=="video")
    {
        echo "<video width='660' height='460' controls>
              <source src='$dir' type='video/$exten'>
              </video><br />";
    }
    if($type=="image")
    {
        echo "<img width='660' height='460' src='$dir'></img><br />";
    }
    if($type=="file")
    {
        $handle = fopen($dir, "r+"); 
        if ($handle) {
            echo "<div width='320' height='240' style='width:320; height=240px;'>";
            echo "<a href=$dir>CLICK HERE TO GET A FILE</a>"."<br />";
            echo "</div>";
        }
    }
    if($type=="text")
    {
        $handle = fopen($dir, "r+"); 
        if ($handle) {
            echo "<div width='320' height='240' style='width:320; height=240px;'>";
        while (($line = fgets($handle)) !== false) {
            echo "<b style='font-family:monospace;'>".$line."</b><br />";
            }
            echo "</div>";
        }
    }
    if($type=='audio')
    {
        echo "<audio controls><source src='$dir' type='audio/$exten'></audio><br />";
    }
}
function _top($pid,$puid,$like)
{
    $link = mysqli_connect("localhost:3306", "root", "root","login");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM user WHERE ID=$puid";
    $result=$link->query($query);
    $row=$result->fetch_row();
    $ufname=$row[1];
    echo "<br><div>$ufname</div>";
    
}
function _bot($like,$i,$pdir,$puid)
{
    include 'read_cookies.php';
    $mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    echo "<div class='likes' id='num$i'>
                 <span onclick=like$i()>Like</span>
                 <span id='$i'>$like</span><br />
             </div>
             <div>";
$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year ORDER BY ID DESC";
$result=$mysqli->query("$query");
$num=mysqli_num_rows($result);

$num=$num-$i;
    
    $tmp="SELECT * FROM c WHERE DIR='$pdir'";
    if($mysqli->query($tmp))
    {       $result=$mysqli->query($tmp);
            $num=mysqli_num_rows($result);
     for($j=0;$j<$num;$j++)
     {
            $result->data_seek($j);
            $row=$result->fetch_row();
            $ufname=$row[1];
            $str=$row[2];
            echo $ufname.":".$str."<br>";
         }
    }
    echo    "<input type='text' placeholder='Comment' id='txt$i' onkeydown='comments$i()'/> 
             </div>";
}


$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year ORDER BY ID DESC";
$result=$mysqli->query("$query");
if($mysqli->query("$query") && $num>0)
{
    $num=mysqli_num_rows($result);
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
        _top($pid,$puid,$like); 
        display($type,$pdir,$puid,$like,$exten,$i); 
        _bot($like,$i,$pdir,$puid);
    }
    
}
?>
