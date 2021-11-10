<?php
  session_start();
  if($_POST['login']){  // opens only if login button clicked

       $rollno1=$_POST['rollno'];
       $rollno=strtoupper($rollno1);
       $password=$_POST['password'];
       $_SESSION['ROLLNO']=$rollno;

       // making connection

    $conn = new mysqli("localhost","root" , "", "shaheer");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
      $check="SELECT * FROM registration WHERE rollno ='".$_SESSION['ROLLNO']."'";
      $result = mysqli_query($conn,$check);
      if(mysqli_num_rows($result)>0){   // check for rollno exists in database
        $sql="SELECT password from registration where rollno ='".$_SESSION['ROLLNO']."'";
        $result=$conn->query($sql);
            $data = mysqli_fetch_array($result);
            if($password==$data["password"]){  // check password and captcha matches or not
              include "page2.php"; // go to voting page
            }
            else{
              echo "<h1>Please check your password<h1>";
            }
      }
      else{
        echo "<h1>Sorry Invalid Roll Number . It seems you dont had registerd... Please register first</h1>";
      }
    }         

   }
   else{
    echo "<script>location.href='page1.html'</script>";
   }

?>