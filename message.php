<?php
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
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];

if(isset($_GET['id']) && isset($_GET['sess']))
{
    $rid=$_GET['id'];
    $sess=$_GET['sess'];
    $query="SELECT * FROM user WHERE ID=$rid";
    $result=$link->query($query);
    $row=$result->fetch_row();
    $ruid=$row[0];
    $rfname=$row[1];
    $query="CREATE TABLE chat(USER1 BIGINT,USER2 BIGINT,SESSION CHAR(11))";  
    $mysqli->query($query);
    $query="INSERT INTO chat VALUES($id,$ruid,$sess)";
    if($mysqli->query($query))
    {
        
    }
    
}
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
    margin: 10px;
    color:white;
    min-width:inherit;
}
body
{
    background-color:white;
}
.left
{
    margin:3px;
    background-color: orangered;
    width: 210px;
    height: 99%;
    border-radius: 10px;
    
}
.middle
{
    width:1070px;
    min-height:655px;
    background-color: orangered;
    border-radius: 10px;
    position: absolute;
    left:230px;
    top:10px;
    color:white;    
    font-family: sans-serif;
}
.char
        {
            width: 200px;
            height: 200px;
            border-color: black;
            border-style: solid;
        }
        #txt
        {
            position: absolute;
            top:500px;
            left:250px;
            width: 280px;
            height: 90px;
        }
        /*.display
        {
            border: 10px;
            height: 300px;
            width: 300px;
            position: absolute;
            overflow-y: scroll;
            max-height: inherit;
            min-height: inherit;
        }*/
                .display
        {
            /*margin: 20px;*/
            height: 300px;
            width: 300px;
            position: absolute;
            left:50px;
            overflow-y: scroll;
            max-height: inherit;
            min-height: inherit;
        }
        .you
        {
            position: absolute;
            left: 400px;
            
            height: 300px;
            width: 300px;
            position: absolute;
            overflow-y: scroll;
            max-height: inherit;
            min-height: inherit;
        }
    
    </style>  
    <title>Chatting</title>
    
 <script src="/test/js/jquery.min.js"></script>   
    </head>
<body>
    <div class="container">
        <div class="left">
        <div id="img" style="background: url(<?=$dir;?>);background-size: 100% 100%;"></div>    
         <div id="nav">
              <h2><a href="userprofile.php">Profile</a></h2>
              <h2><a href="account_setting.php">Account Setting</a></h2>
              <h2><a href="privacy.php">Privacy</a></h2>
               <h2><a href="#">Notifications</a></h2>
               <h2><a href="wall.php">Wall</a></h2>
        </div>    
            </div>
        <div class="middle">
        <h1>Chatting</h1><h1 style="position:fixed;left:800px;"><?=$fname?></h1>
        <h1>Hello</h1><div ></div>
            <div class="chat"> 
        <div class="display">
               <div class="other" >
                   <span id="other"></span>
            
            
            </div></div>
            <div class="you" id="tmp">
                <span id="you"></span>
            
            </div>
                
                
            <textarea id="txt" onkeydown="p()"></textarea>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
    var txt=document.getElementById("txt").value;
        
        function p()
        {
            if (event.keyCode === 13) {
                
                var node=document.createElement('span');
                var content=document.getElementById('txt').value;
                var name=document.createTextNode(content);
                var br=document.createElement('br');
                var current=document.getElementById('you');
                current.appendChild(name);
                current.appendChild(br);
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/test/chat.php?msg='+document.getElementById('txt').value);
                xhr.send();
                xhr.responseText="Go";
                document.getElementById('txt').value='';
                xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE ) {
                if (xhr.status == 200) {
                    var string = xhr.responseText;
                    //alert(xhr.responseText);
                }
                else if (xhr.status == 400) {
                    alert('There was an error 400');
                }
                else {
                    alert('something else other than 200 was returned');
                }    
            }   
    };
            }
        }
        window.setInterval(function(){
  /// call your function here
            var url="/test/chat.php"+"?sess=<?=$sess?>";
            var data="ID=<?=$id?>"+"RUID=<?$ruid?>"+"SESS=<?=$sess?>";
$.ajax({
    type: "POST",
    url: url,
    data: data
})
}, 1000);
        
        
        
        
    </script>
</html>