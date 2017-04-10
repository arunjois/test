<?php
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$email = $link->real_escape_string($_GET["email"]);
//echo $email;
$query="UPDATE login SET profile=1 WHERE email='$email'";
if($link->query($query))
{   
    //echo 'fine';
}




?>
<html>
<head>	<title>Profile</title>
</head>
<style type="text/css">
#logo_image{
                height: 120px;
                width: 150px;
	    }
#txt{
                position: fixed;
                top:27px;
                left:200px;
                color: red;
                font-family: monospace;

	    }
label{
                font-size: 14pt;
                margin: 10px;
                float:left;
                clear:both;
                font-family:Tahoma, Geneva, sans-serif;
            }
input{
                font-size: 14pt;
                border: 10px;
                margin: 10px;
                float:right;
                clear: none;
     }
#sex {
position:fixed;
top:330px;
left:380px;
clear: left;
}
.form{
position:fixed;
top:200px;
left:200px;
}

button{
position:fixed;
top: 360px;
left:380px;
clear: left;
}
#desig
{
position:fixed;
top:330px;
left:380px;
clear:left; 
}




</style>
<body bgcolor="#E6E6FA">
<div class="container">
        <header>
            <div class="logo">
                <img src="images/logo.jpg" id="logo_image">              
            </div>
            <div id="txt">
		    <h1>Social Networking For College</h1> <br /><br />
		    <h2 id="Fields" style="color:red;">All Fields are mandatory.</h2>
                </div>       
             
	</header>
</div>
<div class="form">
<form action="profiles_vaild.php" method="post" id="form">
<!--label>First Name</label>
<input type="text" name="fname" value="<?php echo $fname;?>" > <br /> 
<label>Last Name</label>
<input type="text" name="lname" value="<?php echo $lname;?>" > <br />
<label>College</label>
<input type="text" name="college" value="<?php echo $college;?>" > <br />
<label>Course</label>
<input type="text" name="course" value="<?php echo $course;?> "> <br /> -->
<label>ID </label>
<input type="text" name="reg" > <br />
<label>Current Year in Course</label>
<input type="text" name="year" >
<select name="sex" id="sex">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>

<label>Email</label>
<input type="text" name="email" value="<?php echo $email; ?>" >
<button type= "submit">OK</button>
</form>
</div>


</body>
<script type="text/javascript">
</script>
</html>

