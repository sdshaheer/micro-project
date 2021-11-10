<?php
session_start();
$vote="";
if(isset($_POST['CSE'])){
	echo "<script>alert('Voted for CSE')</script>";
	$vote="CSE";
}
else if(isset($_POST['ECE'])){
	echo "<script>alert('Voted for ECE')</script>";
	$vote="ECE";
}
else if(isset($_POST['EEE'])){
	echo "<script>alert('Voted for EEE')</script>";
	$vote="EEE";
}
else if(isset($_POST['MECH'])){
	echo "<script>alert('Voted for MECH')</script>";
	$vote="MECH";
}

$conn = new mysqli("localhost","root" , "", "shaheer");
            // Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
$check=" UPDATE registration 
SET status='$vote'
WHERE rollno='".$_SESSION['ROLLNO']."'";

 $result = mysqli_query($conn,$check);
echo "<script>location.href='copy.php'</script>";



?>