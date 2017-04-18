<?php
include 'read_cookies.php';
$link = mysqli_connect("localhost:3306", "root", "root","login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query="SELECT DIR FROM DP WHERE USER_ID='$id'";
$data=$link->query($query);
$row=mysqli_fetch_array($data,MYSQLI_ASSOC);
$dir=$row["DIR"];


if(isset($_POST['submit']))
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $college=$_POST["college"];
    $course=$_POST["course"];
    $year=$_POST["year"];
    $regno=$_POST["regno"];
    $sex=$_POST["sex"];
    $desig=$_POST["desig"];
    $query="UPDATE user SET fname='$fname',lname='$lname',college='$college',course='$course',Year=$year,RegNo='$regno',Designation='$desig',Sex='$sex' where ID=$id ";
    $link->query($query);
}
?>
<html>
    <head>
    <title><?=$fname;?></title>
        <style type="text/css">
        #img
        {
            width:180px;
            height:180px;
            border-radius:10px;
            margin: 10px;
            position: fixed;
            
        }
            .container{
                background-color: rgba(0,0,0,0.4);
                background-color:#32127A;
                width: 100%;
                height: 99%;
                border-radius: 10px;
            }
            #fname{
                position: fixed;
                top:50px;
                left:250px;
                color:white;
            }
            .menu{
                position: fixed;
                top:200px;
                left:40px;br />
            }
            .edit{
                color:#f5f5f5;
                font-family: sans-serif;
                font-size: large;
                position: fixed;
                top:230px;
                left:300px;
                
            }
            body{
                
                margin:4px 4px 4px 4px;
            }
            a{
                color:white ;
                text-decoration: none;
            }
            lable{
                float: left;
                margin: 10px;
            }
            input{
                float:right;
                margin:10px;
            }
            button{
                position: fixed;
                top:600px;
                left:500px;
            }
            select
            {
                margin:10px;
            }
            #sex{
                position:relative;
                left:90px;
                top:10px;
                clear: left;
            }
            #image{
                border-style: solid;
                position: absolute;
                border-color: yellow;
                color: white;
                left:900px;
                top:20px;
                display:block;
                z-index: -1;
            }
            /*#date{
                display: none;
            }
            */
        </style>
    
    <body bgcolor="white">
        <div class="container">
            <div id="img" style="background: url(<?=$dir;?>);background-size: 100% 100%;">
              <div><form name="image" id="image" action="dp.php" method="post" enctype="multipart/form-data">
                  <label style="font-size:20px;">Profile Pic</label>
                  <input type="file" name="dp[]" id="dp" />
                  <input type="submit" name="button" id="button"/>
                  </div>
                </form>
            </div>
            <div>
            <h1 id="fname"><?="$fname ";?><?=$lname;?></h1>
                <div class="menu">
                    <div>
                        <h2><a href="view.php">View Profile</a></h2>
                        <h2><a href="account_setting.php">Account Setting</a></h2>
                        <h2><a href="privacy.php">Privacy</a></h2>
                        <h2><a href="wall.php">Wall</a></h2>
                        <h2></h2>
                    </div>
                    
                    <div class="edit">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="forms" name="forms">
                        <lable>First Name</lable>
                        <input type="text" value="<?=$fname;?>" name="fname" ><br />
                        <lable>Last Name</lable>
                        <input type="text" value="<?=$lname?>" name="lname" ><br />
                        <lable>College</lable>
                        <input type="text"  value="<?=$college?>" name="college"><br />
                        <lable>Course</lable>
                        <input type="text" value="<?=$course?>" name="course"><br />
                        <lable>Year</lable>
                        <input type="text" value="<?=$year?>" name="year"><br />
                        <lable>Reg No</lable>
                        <input type="text"  value="<?=$regno?>" name="regno"><br />
                        <lable>Sex</lable>
                        <select name="sex" id="sex">
                            <option value="<?=$sex?>">Male</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select> <br />    
                        <br /><lable>Designation</lable>
                        <input type="text"  value="<?=$desig?>" name="desig"> <br />
                        <input type="submit" id="submit" name="submit" value="Submit"> <br />
                        </form>
                    </div>
                
                </div>
            </div>
            
        </div>
        </body>
        <script type="text/javascript">
        var form = document.getElementById('forms');
            function change()
            {               
                document.getElementById("img").style.backgroundImage = "url('./images/upload.png')";
                document.getElementById("img").style.backgroundSize="100% 100%";
                    //document.getElementById("img").style.background = "url('./images/dp.jpg')";
                
            }
            function dp()
            {
                document.getElementById("img").style.background = "url('../dp/1300624285.png')";
                document.getElementById("img").style.backgroundSize="100% 100%";
            }
            /*function upload()
            {
                
                if(document.getElementById("image").style.display == "none")
                    document.getElementById("image").style.display = "block";
                else
                    document.getElementById("image").style.display = "none";
            }*/

        
        </script>
        </head>
</html>