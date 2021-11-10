<?php

    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: /error.php' ) );
    }

?>

<!DOCTYPE html>
<html>
<head>
     <title>Registration Form</title>
     <link rel="stylesheet" href="check_captcha1.css" type="text/css">
</head>
<body>

     <div class="heading">
        <h1><marquee>Welcome to VVIT SAC Voting</marquee></h1>
     </div>
     <div class="main">
         <div class="register">
            <form action="connect.php" method="post" name="myform" id="register" onsubmit="return validation()">
              <input type="text" placeholder="captcha" name="captcha" id="captcha"><br><br>
              <input type="submit" value="submit" name="captcha_submit" id="submit" >
            </form>
         </div>


     </div>

     <script type="text/javascript">
         function validation(){
            var captcha=document.myform.captcha.value.trim();
            if(captcha==""){
                alert("please fill the captcha")
                return false;
            }
            return true;
         }

    </script>
 </body>
 </html>