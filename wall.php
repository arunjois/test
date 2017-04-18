<?php
include 'read_cookies.php';
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$DIR=$row["DIR"];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Wall</title>
    <link rel="stylesheet" type="text/css" href="css/wall.css">
    
<style type="text/css">
    
    
</style>

</head>
<body >
    <div class="container">
        <div class="left">
        <div id="img" style="background: url(<?=$DIR;?>) no-repeat scroll 0 0;background-size: 100% 100%;">
              
        </div>
        <div id="nameofuser">
            <div class="user">
        <ul><a href="userprofile.php" style="margin:0px;"><?=$fname;?></a></ul>
        <ul><a href="index.php">Logout</a></ul>
            <ul><a href="qna.php">Q&A</a></ul>
            <ul><a href="groups.php">Groups</a></ul>
        </div>
            </div>
            </div>
        <div class="middle" >
            <div class="input">
            <div style="border:10px;color:white;">To Post:</div>
            <form action="input.php" method="post" enctype="multipart/form-data">
            <textarea id="txt" name="txt" placeholder="Text Here" ></textarea> <br />
                <input type="file" name="image[]" id="image" />
                <input type="submit" name="btn" id="btn" value="Submit" />
                <input type="submit" name="post" value="post" />
            </form>
                </div>
            <div class="post">
                <?php
                include 'get_posts.php';
                ?>
        </div>
        </div>
        
        <div class="chat">
            <div id="message">
            <h2 style="color:white;">Chatting</h1> <br />
                <?php include 'msg.php'?>
            </div>
        </div>
</body >
<?php
$mysqli = mysqli_connect("localhost:3306", "root", "root",$college);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
include 'read_cookies.php';
$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year ORDER BY ID DESC";
$result=$mysqli->query("$query");
$num=mysqli_num_rows($result);
?>
<script type="text/javascript">
    <?php include 'script.php';?>
</script>
<script type="text/javascript">

</script>

    
    
    
</html>