
<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: /error.php' ) );
}
?>

<?php

if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
     <title>Reset Password</title>
     <link rel="stylesheet" href="resetpassword.css" type="text/css">
</head>
<body>

     <div class="heading">
        <h1><marquee>Welcome to VVIT SAC Voting</marquee></h1>
     </div>
     <div class="main">
         <div class="register">
            <form  action="updatepassword.php" method="post" name="myform" id="forgetpassword" onsubmit="return validation()">
              <input type="text" placeholder="captcha" name="captcha" id="captcha"><br>
              <input type="password" placeholder="password" name="password" id="password"><br>
              <input type="password" placeholder="confirmpassword" name="confirmpassword" id="confirmpassword"><br>
              <input type="submit" value="submit" name="resetpassword_submit" id="submit" >
            </form>
         </div>


     </div>

     <script type="text/javascript">
         function validation(){

            var captcha1=document.myform.captcha.value;
            var captcha=captcha1.trim();
            var password1=document.myform.password.value;
            var password=password1.trim();
            var confirmpassword1=document.myform.confirmpassword.value;
            var confirmpassword=confirmpassword1.trim();
            
            if(captcha==""){
                alert("Please enter captcha send to mail");
                return false;
            }
            if(password==""){          
                alert("please choose the password");
                return false;
            }
            if(password.length<6){          
                alert("password length should be atleast 6 characters");
                return false;
            }
            if(confirmpassword==""){          
                alert("please re-enter the password");
                return false;
            }
            if(confirmpassword.length<6){          
                alert("password length should be atleast 6 characters");
                return false;
            }
            if(password!=confirmpassword){          
                alert("password doesnt match");
                return false;
            }
            return true;
            
         }

    </script>
 </body>
</html>




