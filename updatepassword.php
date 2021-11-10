<?php



if(!isset($_SESSION)){
    session_start();
}


if($_POST['resetpassword_submit']){   //opens only button clicked

	if($_SESSION['FIVE_DIGIT_CAPTCHA']==$_POST['captcha']){   //check sent captcha and entered are same
            
            $password=$_POST['password'];
            $conn = new mysqli("localhost","root" , "", "shaheer");  //create connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql="UPDATE registration set password='$password' WHERE rollno='".$_SESSION['ROLLNO']."'";
            $result=$conn->query($sql);

            echo"<h1>Successfully changed your password...</h1>";
            session_destroy();
	}
	else{
		echo  "<h1>Sorry your captcha doesnt match...</h1>";
        session_destroy();
	}

}
else{
	echo "<script>location.href='page1.html'</script>";
    session_destroy();
}

?>