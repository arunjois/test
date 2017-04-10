<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/signup.css">
        </link>
    </head>
    <body>
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
        <div id="form">
            <form action="home.php" id="forms" name="forms" method="post">
            <label>First Name</label> 
                <input type="text" id="fname" name="fname" autocomplete="off" /> <br/>
            <label>Last Name</label>
                <input type="text" id="lname" name="lname" autocomplete="off"/> <br/>
            <label>Email ID</label>
                <input type="text" id="email" name="email" autocomplete="off"/> <br/>
            <label>Password</label>
                <input type="password" id="password" name="password" autocomplete="off"/> <br/>
            <label>Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" autocomplete="off"/> <br/>
            <label>College</label>
                <input type="text" id="college" name="college" autocomplete="off"/> <br/>
            <label>Course/Branch(BE)</label>    
                <input type="text" id="course" name="course" autocomplete="off"/>  <br/>
                <label>Designation</label>
                <select name="desig" id="desig">
                    <option value="Student">Student</option>
                    <option value="Teacher">Teachers</option>
                    <option value="Principal">Principal</option>
                </select>
            <button id="done" onsubmit="vaildate">Done!</button>
                </form>
        </div>
    </body>
    <script  src="./js/signup.js">
    </script>
</html>