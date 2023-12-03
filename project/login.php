<?php
require_once('header.php');
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('config.php');
    $uname=$pwd="";
    $uname1=$_POST['txtuname'];
    $pwd=$_POST['txtpass'];
    $role=$_POST['role'];
    $sql1="SELECT * FROM registration where Username='$uname1' AND Pass='$pwd' ";
    $result1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1) > 0)
    {
        while($row=mysqli_fetch_assoc($result1))
        {
            $id=$row["Reg_ID"];
            $uname=$row["Username"];
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['uname']=$uname1;
        }
        header("Location: welcome.php");
    }
   else {
    echo "invalid username or password";
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <title>Login</title>
</head>
<body>
<div class="back-img">
        <div class="content">
        <form class="form1" method="post" action="login.php"><br>
        <h2>Login to account</h2><br><br><br><!-- <div <?php if(mysqli_num_rows($result)==0): ?> class="errdetails" <?php endif ?> >
        <?php if(mysqli_num_rows($result)==0) { echo $errdetails;} ?></div> -->
            <h4>Enter username: </h4><input class="inputbox" type="text" id="txt4" name="txtuname"><br><br><br>
            <h4>Enter password: </h4><input class="inputbox" type="password" id="txt5" name="txtpass"><br><br><br>
            <!-- <h4>Select Role: </h4><select name="role" id="role" class="role">
                <option value="Driver">Driver</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select><br><br><br><br> -->
            <input type="submit" id="sub1" class="login" value="login">&nbsp;
            <br><br><br><br>
            <h4>&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Not registered? <a class="reglink" href="register.php">Register Now</a></h4>
           
        </form>
        
        </div>
        
</div>
</body>

</html>

