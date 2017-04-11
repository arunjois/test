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
        <ul><a href="#">Logout</a></ul>
            <ul><a href="qna.php">Q&A</a></ul>
            <ul><a href="groups.php">Groups</a></ul>
            <ul><a href="">Notifications</a></ul>
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
                
                
                
                ?>
        </div>
        </div>
        
        <div class="chat">
            <div id="message">
            <h2 style="color:white;">Chatting</h1> <br />
            <a href="">Chandler Bing</a> <br /><br />
            <a href="">Ross Geller</a> <br /><br />
            <a href="">Joey Tribbiani</a> <br /><br />
            <a href="">Monica Geller</a> <br /><br />
            <a href="">Rachel Green</a> <br /><br />
            <a href="">Phoebe Buffay</a> <br /><br />
            </div>
        </div>
        
    

    
</body >
<script type="text/javascript">
    
    
    function myFunction(){
        document.getElementById("som").setAttribute("src","./images/London.jpg");
        //var img=document.getElementById("som");
        //img.innerHTML="<img src=./images/dp.png>";
    }
   function like()
    {
        var node=document.getElementById('sp');
        var num=document.getElementById('sp').firstChild;
        num.data++;
        var newNum=num.data;
        node.appendData(newNum);
    }
    function comments()
    {
        if (event.keyCode == 13) { 
            //alert('Hello');
            var node=document.createElement('div');
            var content='<?=$fname?>:'+document.getElementById('comm1').value;
            var name=document.createTextNode(content);
            var current=document.getElementById('num');
            current.appendChild(name);
            document.getElementById('comm1').value="";
        }
    }
</script>
</html>