<?php
include 'read_cookies.php';
$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year ORDER BY ID DESC";
$result=$mysqli->query("$query");
$num=mysqli_num_rows($result);
if($num>0)
{
     for($i=0;$i<$num;$i++)
    {
         $string="function like$i()
        {   
            var node=document.getElementById('$i');
            var num=document.getElementById('$i').firstChild;
            num.data++;
            var app=node.innerHTML.text=num.data;    
        }
        function comments$i()
        {
            if (event.keyCode == 13) {
                var node=document.createElement('div');
                var content='$fname:'+document.getElementById('txt$i').value;
                var name=document.createTextNode(content);
                var current=document.getElementById('num$i');
                current.appendChild(name);
                document.getElementById('txt$i').value='';
            }
        }
        ";
         echo $string;
     }
}
?>
