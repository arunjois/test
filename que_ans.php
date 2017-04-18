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
$qid=$_GET["qid"];
if(isset($_POST['submit']) && $_POST['ans']!='')
{
    $query="SELECT ID FROM $qid";
    $data=$mysqli->query("$query");
    $row=mysqli_num_rows($data);
    $row==0?$ID=0:$ID=$row;
    $ID++;
    $question=$link->real_escape_string($_POST["ans"]);
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/qna/'.$ID;
    $extension=".txt";
    $uploadfile = $uploaddir . $extension;
    $handle = fopen($uploadfile, "w+");
    fwrite ( $handle , $question );
    
    
    
    $query="SELECT * FROM $qid";
    $result=$mysqli->query($query);
    $num=mysqli_num_rows($result);
    $query="INSERT INTO $qid VALUES($ID,'$uploadfile',$id,'$fname',1)";
    $result=$mysqli->query($query);
}
else
{

$query="SELECT * FROM qna WHERE QID='$qid'";
$result=$mysqli->query($query);
$row=$result->fetch_row();

$query="SELECT * FROM $qid WHERE ID!=0 AND A=0";
$result=$mysqli->query($query);
$num=mysqli_num_rows($result);
if($num>0)
{
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $f_dir=$row[1];
        $u_fname=$row[3];
        $string=file_get_contents($f_dir);
    }
}
}
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];

?>
<html>
<head>
    

    <style type="text/css">
.container
{
	width=100%;
	height=99%;
}
#img{
    border-radius: 10px;
    width: 180px;
    height: 180px;
    margin: 10px;
    position:absolute;
    top:10px;
    left: 10px;
}
#nav{
    position: absolute; 
    top:200px;
}
a{
    color:white;
    text-decoration: none;
    margin:20px;
    font-family: sans-serif;
}
h1
{
    color:white;
    margin: 10px;
}
body
{
    background-color:white;
}
.left
{
    margin:3px;
    background-color: #32127A;
    width: 210px;
    height: 99%;
    border-radius: 10px;
    
}
.middle
{
    width:1050px;
    height:635px;
    background-color: #32127A;
    border-radius: 10px;
    position: absolute;
    left:230px;
    top:10px;
    color:white;    
    font-family: sans-serif;
    padding: 10px;
    overflow: hidden;
}
#fname
{
    position: absolute;
    top:10px;
    left:40px;
    margin:10px;
    font-family: sans-serif;
}
#acc
{
    position: absolute;
    top:100px;
    left:40px;
    margin: 10px;
    font-family: sans-serif;
}
#form
        {
            position: absolute;
            left:40px;
            align-content: center;
        }
label
{
    font-family: sans-serif;
    margin:10px;
    float:left;
}
input
{
    margin: 10px;   
}
#data
{
    position: absolute;
    top:200px;
    left:70px;
    
}
#tit
        {
            position: relative;
            left:10px;
        }
textarea
{
    width: 400px;    
    height: 200px;
}
 
    </style>
    
    </head>
    <body>
    <div class="container">
        <div class="left">
        <div id="img" style="background: url(<?=$dir?>);background-size: 100% 100%;"></div>    
         <div id="nav">
              <h2><a href="userprofile.php">Profile</a></h2>
              <h2><a href="account_setting.php">Account Setting</a></h2>
              <h2><a href="privacy.php">Privacy</a></h2>
               <h2><a href="wall.php">Wall</a></h2>
	</div>
        </div>    <div class="middle">
                <h1>Question</h1>
                <?php
$query="SELECT * FROM $qid WHERE ID!=0 AND A=0";
$result=$mysqli->query($query);
$num=mysqli_num_rows($result);
if($num>0)
{
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $f_dir=$row[1];
        $u_fname=$row[3];
        $string=file_get_contents($f_dir);
        echo "<h1>$u_fname: $string</h1>";
    }
}
?>
                <div id="form">
                <form method="post" id="forms"  action="<?php $_SERVER['PHP_SELF']?>">
                    <lable>Answer</lable> <br />
                    <textarea name="ans" id="answer"></textarea>
                    <input type="submit" name="submit" onsubmit="valid()"/>
                </form>
                <?php
$query="SELECT * FROM $qid WHERE ID!=0 AND A=1";
$result=$mysqli->query($query);
$num=mysqli_num_rows($result);
if($num>0)
{
    for($i=0;$i<$num;$i++)
    {
        $result->data_seek($i);
        $row=$result->fetch_row();
        $f_dir=$row[1];
        $u_fname=$row[3];
        $string=file_get_contents($f_dir);
        echo "$u_fname: $string<br />";
    }
}
                    ?>
                </div>
                </div>
        </div>
    </body>
</html>