
<?php
session_start();
 
if($_POST['generatecaptcha']){   // works only if generate captcha button is clicked
        $_SESSION['name']=$_POST['username'];
        $rollno=$_POST['rollno'];
        $_SESSION['year']=$_POST['year'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['branch']=$_POST['branch'];
        $_SESSION['gender']=$_POST['gender'];
        $_SESSION['mobile']=$_POST['mobile'];
        $_SESSION['dateofbirth']=$_POST['dateofbirth'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['ROLLNO']=strtoupper($rollno);

        // Create connection

              $conn = new mysqli("localhost","root" , "", "shaheer");
              if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
              }

              // check if roll no already exists in database
   
                $check="SELECT * FROM registration WHERE  rollno='".$_SESSION['ROLLNO']."'";
                $result = mysqli_query($conn,$check);
                if(mysqli_num_rows($result)>0){   
                       echo "<h1>Sorry you have already registered...</h1>";

                }
                else{
                  // check for captcha exists in database

                        $myrandomstring=generateRandomString(10);
                        while(true){
                                $check="SELECT * FROM registration WHERE  captcha= '$myrandomstring'";
                                $result = mysqli_query($conn,$check);
                                if(mysqli_num_rows($result)>0){   
                                          $myrandomstring=generateRandomString(10);
                                }
                                else{
                                          break;
                                }
                        } // closing while loop

                       // sending mail to the user
        
                       $to_email =$_SESSION['email'];
                       $subject = "VVIT Online Voting Regeistration Captcha";
                       $body = "Hi, your captcha is $myrandomstring";
                       $from="sdshaheer5421@gmail.com";
                       $headers = "From: $from";

                       $_SESSION['generatedcaptcha']=$myrandomstring;
                       mail($to_email,$subject,$body,$headers);
                       include 'check_captcha.php';    //  after sending mail goes to check_captcha page
      

                }

        
}
else{
  echo "<script>location.href='registration.php'</script>"; 
}
          

//  function for generating random captcha

 function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>