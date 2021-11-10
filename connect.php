<?php
  
  if(!isset($_SESSION)){  // starting session
    session_start();
  }
  

  if($_POST['captcha_submit']){  // check if form is submitted
     if($_POST['captcha']==$_SESSION['generatedcaptcha']){   // check entered captcha and generated captcha same or not

         // Create connection

                $conn = new mysqli("localhost","root" , "", "shaheer");
                if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                 }

                      $sql = "INSERT INTO registration (rollno,username,year,password,branch,gender,mobile,dateofbirth,email,captcha)
                              VALUES ('".$_SESSION['ROLLNO']."',
                                      '".$_SESSION['name']."',
                                      '".$_SESSION['year']."',
                                      '".$_SESSION['password']."',
                                      '".$_SESSION['branch']."',
                                      '".$_SESSION['gender']."',
                                      '".$_SESSION['mobile']."',
                                      '".$_SESSION['dateofbirth']."',
                                      '".$_SESSION['email']."',
                                      '".$_SESSION['generatedcaptcha']."')";
                      mysqli_query($conn,$sql);
                      echo "<h1>successfully registered...</h1>";

                      session_destroy ();  // destroy session variable

     }
     else{
      echo "<script>alert('sorry your captcha doesnt match')</script>";
      echo "<script>location.href='registration.html'</script>"; 
     }

  }
  else{
    echo "<script>location.href='registration.html'</script>";  // if form not submitted redirect to same page
  }


?>