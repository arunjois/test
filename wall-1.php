<?php
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT ";




?>
<html>
<head><title>Wall</title>
<style type="text/css">
.selector
{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color:cyan;
}
    
</style>

</head>
<body>
<div class="selector">

</div>


</body>

</html>