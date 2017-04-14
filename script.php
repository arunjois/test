<?php
include 'read_cookies.php';
$query="SELECT * FROM post WHERE COURSE='$course' AND YEAR=$year ORDER BY ID DESC";
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
         echo "function like$i()
        {   
            var node=document.getElementById('$i');
            var num=document.getElementById('$i').firstChild;
            num.data++;
            var app=node.innerHTML.text=num.data;
            var j=num.data;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/test/update.php?src=$pdir');
            xhr.send();
            if (xhr.status === 200) {
        alert('User\'s name is ' + xhr.responseText);
    }
        }
        function comments$i()
        {
            if (event.keyCode == 13) {
                var node=document.createElement('div');
                var content='$fname:'+document.getElementById('txt$i').value;
                var name=document.createTextNode(content);
                var br=document.createElement('br');
                var current=document.getElementById('num$i');
                current.appendChild(name);
                current.appendChild(br);
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/test/update.php?src=$pdir&fname=$fname&com='+document.getElementById('txt$i').value);
                xhr.send();
                if (xhr.status === 200) {
                    alert('User\'s name is ' + xhr.responseText());
                document.getElementById('txt$i').value='';
                }
                document.getElementById('txt$i').value='';
            }
        }
        ";
         
     }
}
?>
