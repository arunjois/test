 <html>
  <head>
  <title>Login</title>
<style type="text/css">

body{
            background-color:#000080;
            background-size: cover;
        }
        #logo_image{
                height: 120px;
                width: 150px;
            }
       
            #txt{
                position: fixed;
                top:27px;
                left:200px;
                color: white;
                font-family: monospace;
                
            }
        #signup{
                position: fixed;
                left:1100px;
                top:40px;
                display: inline-block;  
                
            }
        #sign{
            text-align: center;
                background-color:white;
                font-family: monospace;
                border: 1px solid;
                border-radius: 5px;
                border: 1px;
                padding: 15px;
                text-align: center;
                color:green;
                font-size: 14pt;
                
        }
        form{
            position: fixed;
            padding: 10px;
            color: white;
            top:220px;
            left: 33px;
        }
        label{
            border:10px;
            margin: 10px;
            float:none;
            font-size: 14pt;
            font-family: monospace;
            font-weight: bold;
        }
        input{
            margin: 10px;
            font-family: monospace;
            font-size: 14pt;
        }
         #login{
                margin:10px;
                text-align: center;
                background-color:white;
                font-family: monospace;
                border: 1px solid;
                border-radius: 5px;
                border: 1px;
                padding: 15px 32px;
                text-align: center;
                color:green;
                font-size: 14pt;

            }
        .about{
            position: fixed;
            top:200px;
            left:500px;
            color:white;
            font-size: 15pt;
            font-family: serif;
        }


</style>  
</head>
  <body>
  </body>
  <div class="login-page">
<h1 style="color:white;position:fixed;left:50px;top:100px; ">Login Failed</h1>	  
<form action="login.php" id="forms" method="post">
              <div>
              <label>E-Mail</label> <br />
                  <input type="text" name="email" placeholder="someone@domain.com" autocomplete="off"><br />
              <label>Password</label> <br />
                  <input type="password" name="password" placeholder="•••••••••••" > <br />
                  <button id="login"  onsubmit="vaild" >Login</button>
              </div>
  
  
          </form>
  
  
  
  
  </html>

