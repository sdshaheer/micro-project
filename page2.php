<?php 
      if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: /error.php' ) );
      }

?>

<!DOCTYPE html>
<html>
</script>
<head>
	<link rel="stylesheet" href="page2.css" type="text/css">
</head>
<body>
  <div class="information">
  	 <div class="heading">
        <h1><marquee>Welcome to VVIT SAC Voting</marquee></h1>
     </div>

     <div class="logout">
     <form action="logout.php" method="post" onsubmit='return confirmlogout()'>
          <input type="submit" value="logout" name="logout" id="logouts">
    </form>
    </div>

  	<div class="first">
  		<table class="gap">
  			<?php

             if(!isset($_SESSION)) 
              { 
                session_start();
              }

            $conn = new mysqli("localhost","root" , "", "shaheer");
            // Check connection
            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }
            $sql="SELECT username,rollno,year,branch,gender,mobile,email,status FROM registration WHERE rollno='".$_SESSION['ROLLNO']."'";
            $result=$conn->query($sql);
            $data = mysqli_fetch_array($result);
            if(is_null($data['status'])){

                   echo "<tr><td>". "UserName :". "</td><td>". $data["username"]. "</td></tr>";
                   echo "<tr><td >". "RollNo :". "</td><td>". $data["rollno"]."</td></tr>";
                   echo "<tr><td>". "Year :". "</td><td>". $data["year"]. "</td></tr>";
                   echo "<tr><td>". "Branch :". "</td><td>". $data["branch"]. "</td></tr>";
                   echo "<tr><td>". "Gender :". "</td><td>". $data["gender"]. "</td></tr>";
                   echo "<tr><td>". "Mobile :". "</td><td>". $data["mobile"]. "</td></tr>";
                   echo "<tr><td>". "E-Mail :". "</td><td>". $data["email"]. "</td></tr>";
                   echo "<tr><td>". "Status :". "</td><td>"."not voted". "</td></tr>";
                   echo "</table>";
               
            }
            else{
              echo "<script>location.href='copy.php'</script>";
            }

  		    ?>
  		</table>
  	<div>
    <form action="voted.php" method="post" name="myform" id="login" onsubmit='return checkbutton()'>
  	<div class="second">
  		<div class="common">
  			<label id="number"><img src="cse.jpg"></label>
  			<label id="branch">CSE</label>
  			<input type="submit" value="Vote" name="CSE" id="submit">
  		</div>
  	</div>
  	<div class="third">
  		<div class="common">
  			<label id="number"><img src="ece.jpg"></label>
  			<label id="branch">ECE</label>
  			<input type="submit" value="Vote" name="ECE" id="submit">
  		</div>
  	</div>
  	  	<div class="fourth">
  		<div class="common">
  			<label id="number"><img src="eee.jpg"></label>
  			<label id="branch">EEE</label>
  			<input type="submit" value="Vote" name="EEE" id="submit">
  		</div>
  	</div>
  	  	<div class="fifth">
  		<div class="common">
  			<label id="number"><img src="mech.jpg"></label>
  			<label id="branch">MECH</label>
  			<input type="submit" value="Vote" name="MECH" id="submit">
  		</div>
  	</div>
  </form>
   </div>	


</body>	

<script type="text/javascript">
        function checkbutton(){

          var value=confirm("Are you sure want to vote");
          if(value==true){
            return true;
          }
          else{
            return false;
          }
        }

        function confirmlogout(){
          var value=confirm("Confirm logout");
          if(value==true){
            return true;
          }
          else{
            return false;
          }
        }

   </script>

</html>