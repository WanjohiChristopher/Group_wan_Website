<?php
session_start();
require"config.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#7f8c8d">
<div id="body">

        <center><h1>LOGIN FORM</h1>
            <img src="images/groupwan.jpg"class="photo"/>
        </center>

    <form  class="myform" action="login.php"method="post">
        <label><b><b>Username</label><br>
        <input name="username" type="text"class="input"placeholder="Enter your name"autocomplete="off"required/><br>
        <label><b><b>Password</label><br>
        <input name="password" type="password"class="input"placeholder="Enter your password"autocomplete="off"required/><br>
        <label><b><b>Phone number</label><br>
        <input name="phone" type="number"class="input"placeholder="Enter your number"autocomplete="off"required/><br>
        <input name="login" type="submit"id="login_btn"value="LOGIN"/><br>

    </form>
    <?php
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $query="select * from users WHERE username='$username'AND password='$password' AND phone='$phone'";
        $query_run=mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)){
            //valid
            $_SESSION['username']=$username;
            header("location:home.php");
        }else{
            //invalid
            echo"<script type='text/javascript'>alert('invalid credentials')</script>";
        }
    }
    ?>
</div>

</body>
</html>