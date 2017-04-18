<?php
include 'read_cookies.php';
include 'ip.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT DIR FROM DP WHERE USER_ID=$id";
    $data=$link->query($query);
    $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
    $dir=$row["DIR"];
if(isset($_POST['submit']))
{
    $new_email=$_POST['email'];
    $password=md5($_POST['password']);
    $query="SELECT email,password FROM login where id=$id";
    $data=$link->query($query);
    $row=mysqli_fetch_array($data,MYSQLI_ASSOC);
    $email_id=$row["email"];
    $ppassword=$row["password"];
    if($new_email!==$email_id )      //MIND THE NOT(!) IN IF STATEMENT
    {
        $link = mysqli_connect("localhost:3306", "root", "root","login");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $message = "Please visit following link http://".$localIP."/confirm.php?email=$new_email"; 
        mail($new_email,'For Email Confirmation',$message);
        $query="UPDATE login SET email='$new_email',status=0 WHERE ID=$id";
        $link->query($query);    
    }
    if($password!==$ppassword)
    {
        $link = mysqli_connect("localhost:3306", "root", "root","login");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $query="UPDATE login SET password='$password' WHERE ID=$id";
        $link->query($query);
    }

}


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/account_setting.css">    
</head>
<body>
    <div class="container">
        <div class="left">
        <div id="img" style="background: url(<?=$dir;?>);background-size: 100% 100%;"></div>    
         <div id="nav">
              <h2><a href="userprofile.php">Profile</a></h2>
              <h2><a href="account_setting.php">Account Setting</a></h2>
              <h2><a href="privacy.php">Privacy</a></h2>
               <h2><a href="wall.php">Wall</a></h2>
        </div>     

    
    </div>
        <div class="middle">
        <h1 id="fname"><?=$fname?>   <?=$lname;?></h1>
        <br /> <br/>
        <h2 style="margin:10px;" id="acc">Account Settings</h2>
    
            <div id="data">
                <form method="post" id="forms" action="<?php $_SERVER['PHP_SELF'] ?>"> 
            <label>Email Id</label> 
            <input type="text" name="email" id="email" value="<?=$email;?>" autocomplete="off"/> <br />
        <label>New/Old Password</label>
            <input type="password" name="password" id="password"/> <br />
        <label>Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" /> <br />
                    <input type="submit" name="submit" value="Submit" onclick="vaild()"/>    
            </form>
            </div>
        </div>
    </div>
</body>
<script>
    function vaild()
    {
        var form=document.getElementById('forms');
        if(form.email.value=='' || form.password.value=='' || form.password.value=='•' )
        {
            alert("Please Fill email/password");
            return false;
        }
        else if(form.password.value.length<6)
         {
             alert("Longer Password Please");
             return false;
         }
        else if(form.password.value!==form.cpassword.value)
            {
                alert("Passwords don't match");
                return false;
            }
        
    }
    
    </script>

</html>
