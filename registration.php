<!DOCTYPE html>
<html>
<head>
     <title>Registration Form</title>
     <link rel="stylesheet" href="registration.css" type="text/css">
</head>
<body>

     <div class="heading">
        <h1><marquee>Welcome to VVIT SAC Voting</marquee></h1>
     </div>
     <div class="main">
         <div class="register">
              <h2>Register Here</h2>
              <form action="generatemail.php" method="post" name="myform" id="register" onsubmit="return validation()">
                 <div id="user1">
                 <input type="text" name="username" id="names" placeholder="user name"><br><br>
                 <label>Year</label>
                 &nbsp;&nbsp;&nbsp;
                 <select name="year" id="names">
                     <option value=0></option>
                     <option value=1>1</option>
                     <option value=2>2</option>
                     <option value=3>3</option>
                     <option value=4>4</option>
                 </select><br><br>
                 
                 <label>Branch</label>
                 &nbsp;&nbsp;&nbsp;
                 <select name="branch" id="names">
                     <option value=0></option>
                     <option value="CSE">CSE</option>
                     <option value="ECE">ECE</option>
                     <option value="IT">IT</option>
                     <option value="EEE">EEE</option>
                     <option value="MECH">MECH</option>
                 </select><br><br>
                 <label>Gender</label><br>&nbsp&nbsp;
                 <input type="radio" name="gender" id="male" value="male">&nbspMale&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="gender" id="female" value="female">&nbspFemale<br><br>
                 <label>Date Of Birth</label><br><br>&nbsp;
                 <input type="date" name="dateofbirth" id="names" placeholder="DOB"><br><br>
                 
                </div>
                <div id="user2">
                 <input type="text" name="rollno" id="second" placeholder="Roll Number"><br><br>
                 <input type="password" name="password" id="second" placeholder="password"><br><br> 
                 <input type="password" name="confirmpassword" id="second" placeholder="confirm password"><br><br>
                 <input type="text" name="mobile" id="second" placeholder="mobile"><br><br>
                 <input type="email" name="email" id="second" placeholder="e-mail id"><br><br>    
                 <input type="submit" value="Generate Captcha" name="generatecaptcha" id="submit"> 
                 </div>     
              </form>
                 
         </div> 
      </div>

      <script type="text/javascript">
              function validation(){
                     var names = document.querySelectorAll("[id='names']");
          
                     var date = new Date();
                     var currentyear = parseInt(date.getFullYear().toString().substring(2,4));

                     var username1=document.myform.username.value;
                     var username=username1.trim();
                     var rollno1=document.myform.rollno.value;
                     var rollno=rollno1.trim().toUpperCase();
                     var year1=names[1].value;
                     var password1=document.myform.password.value;
                     var branch1=names[2].value;
                     var confirmpassword1=document.myform.confirmpassword.value;
                     var gender1=document.myform.gender.value;
                     var mobile1=document.myform.mobile.value;
                     var mobile=mobile1.trim();
                     var dob=document.myform.dateofbirth.value;
                     var email=document.myform.email.value;
                     var emailstart=email.substring(0,10).toUpperCase();
                     var emailend="@vvit.net";


                  // for user name validation
                     if(username==""){
                        alert("User Name should not be empty");
                        return false;
                     }
                     if((username.length<=2) || (username.length>21)){
                        alert("User Name should be in range 3-20 characters");
                        return false;
                     }
                     if(rollno==""){       //roll number validation
                        alert("Roll Number should not be empty");
                        return false;
                     }
                     if(rollno.length!=10){
                        alert("Roll Number should be 10 digits");
                        return false;
                     }
                     if((currentyear-parseInt(rollno.substring(0,2))>=4) || (parseInt(rollno.substring(0,2))>currentyear)){   
                        alert("Roll number should be in range "+(currentyear-3)+" and "+currentyear)
                        return false;
                     }
                     if(!(rollno.substring(2,4)=="BQ")){
                        alert("you are not VVIT student . code of VVIT is BQ ");
                        return false;
                     }
                     if(year1==0){          // year validation
                        alert("please choose the year");
                        return false;
                     }
                     if(password1==""){          
                        alert("please choose the password");
                        return false;
                     }
                     if(password1.length<6){          
                        alert("password length should be atleast 6 characters");
                        return false;
                     }
                     if(branch1==0){          // branch validation
                        alert("please select your branch");
                        return false;
                     }
                     if(confirmpassword1==""){          
                        alert("please re-enter the password");
                        return false;
                     }
                     if(password1!=confirmpassword1){          
                        alert("password doesnt match");
                        return false;
                     }
                     if(gender1==""){
                        alert("select your gender");
                        return false;
                     }
                     if(mobile==""){
                        alert("Enter your mobile number");
                        return false;
                     }
                     if(mobile.length!=10){
                        alert("mobile number has 10 digits");
                        return false;
                     }
                     if(isNaN(mobile)){
                        alert("mobile number contains only digits");
                        return false;
                     }
                     if(!(mobile.substring(0,1)=="7"||mobile.substring(0,1)=="8"||mobile.substring(0,1)=="9")){
                        alert("mobile number starts with 7 or 8 or 9");
                        return false;
                     }
                     if(dob==""){
                        alert("select your date of birth");
                        return false;
                     }
                     if(email==""){
                        alert("Enter your Email-Id");
                        return false;
                     }
                     if(emailstart!=rollno || emailend!=email.substring(10,email.length)){
                        alert("please enter validd email");
                        return false;
                     }
                     return true;
                     
               }


      </script>

</body>





</html>