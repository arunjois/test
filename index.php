<?php
//use test database to create new database
$link = mysqli_connect("localhost:3306", "root", "root","test");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="CREATE DATABASE login";
$link->query($query);

?>

<html>
<head>
<title>Hi!</title>    
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    </link>
    
</head>
<body >
    <div class="container">
        <header>
            <div class="logo">
                <img src="./images/logo.jpg" id="logo_image">              
            </div>
            <div id="txt">
                    <h1>Social Networking For Colleges</h1>                
                </div>       
            <div id="signup">
                   <a href="signup.php"><button id="sign">Sign UP!</button></a>
            </div> 
        </header>    
    </div>
    <div class="login-page">
        <form action="login.php" id="forms" method="post">
            <div>
            <label>E-Mail</label> <br />
                <input type="text" name="email" placeholder="someone@domain.com" autocomplete="off"><br />
            <label>Password</label> <br />
                <input type="password" name="password" placeholder="•••••••••••" > <br />
                <button id="login"  onsubmit="vaild" >Login</button>            
            </div>
            
        
        </form>
   
    </div>  
    <div class="about">
        <div>
        <ul>
                    <li>
                        <h3>About Us:</h3>
                        The aim of the website is to produce a platform for a classroom and college environment. 
                    </li>
                    </ul>
                    <ul>
                    <li>
                        <h3>Services</h3>
                            The website provides all the required tools and environment for classroom discussion to carry on.
                            User can also share text, images and much more. A platform desiged for Question and Answer Sessions
                            Chat with friends, teachers and also get in touch with your college principal. <b>Sign Up NOW!</b>             
                    </li>    
                    <ul>
                    <li>
                       <h3>Produced By</h3>
                            Arun S Jois and Syed Saif.
                    </li>
                    </ul>
                    </ul>
        </div>
    
    </div>
    <div>
    </div>  
    <script type="text/javascript">
        var form = document.getElementById('forms');
        form.onsubmit = function vaild(){
            if(form.email.value=='' || form.password.value=='')
                    {
                        alert('misssing first name or password');
                        return false;
                    }
            
        
        }
          
        
    </script>
</body>
</html>