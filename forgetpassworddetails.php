<?php
  
  if(!isset($_SESSION)){  // starting session
    session_start();
  }

 if($_POST['submit']){

 	$_SESSION['ROLLNO']=$_POST['rollno'];
 	$_SESSION['EMAIL']=$_POST['email'];

 	// Create connection

            $conn = new mysqli("localhost","root" , "", "shaheer");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql="SELECT rollno,email FROM registration WHERE rollno='".$_SESSION['ROLLNO']."'";
            $result=$conn->query($sql);
            if(mysqli_num_rows($result)>0){
            	        $myrandomstring=generateRandomString(5);

                       // sending mail to the user
        
                       $to_email = $_SESSION['EMAIL'];
                       $subject = "Simple Email Test via PHP";
                       $body = "Hi, your captcha is $myrandomstring";
                       $from="sdshaheer5421@gmail.com";
                       $headers = "From: $from";

                       $_SESSION['FIVE_DIGIT_CAPTCHA']=$myrandomstring;
                       mail($to_email,$subject,$body,$headers);
                       include 'resetpassword.php';
            
            }
            else{
            	echo "<h1>Sorry we cant find your details....Please register first</h1>";
            }






 }
 else{
 	echo "<script>location.href='forgetpassword.html'</script>"; 
 }


//  function for generating random captcha

 function generateRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


 ?>