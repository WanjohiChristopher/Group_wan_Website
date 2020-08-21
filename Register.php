<?php
require"config.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head><title>Registration Form</title>

    <link rel="stylesheet" href="style.css">

</head>
<body style="background-color:#000">
<div id="body">
    <center><h1>REGISTRATION FORM</h1>
        <img src="images/groupwan.jpg"class="photo"/>
    </center>
    <form  class="myform" action="Register.php"method="post">
        <label><b><b>Username</label><br>
        <input name="username" type="text"class="input"placeholder="Enter your name"autocomplete="off"required/><br>
        <label>Country</label><br>
        <select class="form.control"name="country" required>
            <option disabled><b>select a country</b></option>
            <option>Kenya</option>
            <option>Uganda</option>
            <option>Tanzania</option>
            <option>Ethiopia</option>
            <option>Sudan</option>
            <option>Somalia</option>
            <option>Zimbabwe</option>
            <option>Europe</option>
        </select><br>
        <label><b>Gender</b></label><br>
        <input type="radio"name="gender"class="gender.style"value="Male" checked required/>Male
        <input type="radio"name="gender"class="gender.style"value="Female" checked required/>Female<br>

        <label><b>Password</b></label><br>
        <input name="password" type="password"class="input"placeholder="Enter your password"autocomplete="off"required/><br>
        <label><b> Confirm Password</b></label><br>
        <input name="cpassword" type="password"class="input"placeholder="Confirm your password"autocomplete="off"required/><br>
        <label><b><b>Phone number</label><br>
        <input name="phone" type="number"class="input"placeholder="Enter your number"autocomplete="off"required/><br>
        <a href="login.php"><input name="submit_btn" type="submit"id="signup_btn"value="SIGN UP"/></a><br>

    </form>
    <?php
    if(isset($_POST['submit_btn']))
    {
        //echo"<script type='text/javascript'>alert('Sign up button clicked')</script>";
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $country=$_POST['country'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];

        if($password==$cpassword){
            $query="select *  from users WHERE username='$username'";
            $mysqli_result=mysqli_query($con,$query);
            if(mysqli_num_rows($mysqli_result)>0)
            {
                //   there is already a user with the same username
                echo"<script type='text/javascript'>alert('User already exists...try another username')</script>";
            }else
            {
                $query="insert into users (username,password,phone) values('$username','$password','$phone')";
                $query_run=mysqli_query($con,$query);
                if($query_run){

                    header("location:login.php");
                    //echo"<script type='text/javascript'>alert('Registered.....Go to login page')</script>";
                }else{
                    echo"<script type='text/javascript'>alert('Error,Registration failed')</script>";
                }

            }
        }else{
            echo"<script type='text/javascript'>alert('passwords does not match')</script>";
        }

    }
    ?>
</div>

</body>
</html>