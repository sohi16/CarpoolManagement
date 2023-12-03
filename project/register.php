<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once('header.php');
require('config.php');
$uname_err="";
$name="";
$contact="";
$gender="";
$address="";
$uname="";
$pass="";

if(isset($_POST['register']))
{
$name=$_POST['txtname'];
$contact=$_POST['txtnum'];
$gender=$_POST['rd1'];
$address=$_POST['txtadd'];
$uname=$_POST['txtuname'];
$pass=$_POST['txtpass'];

if(!preg_match("/^[a-zA-Z]*$/",$name) || $name=='')
{
    echo "<script>alert('Fill name and only alphabets and whitespace allowed for name')</script>";
}
if(!preg_match("/^[0-9]*$/",$contact) || $contact=='')
{
    echo "<script>alert('Fill contact and only alphabets and whitespace allowed for name')</script>";
}
if(strlen($contact)<10 && strlen($contact)>10)
{
    echo "<script>alert('Contact number should be 10 digits')</script>";
}
if($gender=='')
{
    echo "<script>alert('Enter gender')</script>";
}
if(!preg_match("/^[a-zA-Z0-9]*$/",$address) || $address=='')
{
    echo "<script>alert('Address is required and only alphabets and numbers allowed')</script>";
}
if(!preg_match("/^[a-zA-Z0-9]*$/",$uname) || $uname=='' || strlen($uname)>20)
{
    echo "<script>alert('Username is required and only alphabets and numbers allowed')</script>";
}
if($pass=='')
{
    echo "<script>alert('Password is required')</script>";
}
$select="SELECT Username from registration where Username='$uname'";
$res=mysqli_query($conn,$select);
$count=mysqli_num_rows($res);
if($count>0)
{
    $uname_err="User already exist";
}

else
{
   
    $sql="INSERT INTO `registration`(`Reg_ID`, `Name`, `Contact`, `Gender`, `Address`, `Username`, `Pass`) VALUES ('null','$name','$contact','$gender','$address','$uname','$pass')";    
    $resInsert=mysqli_query($conn,$sql);
    if($resInsert){
        header('location: login.php');
    }
    else {
        mysqli_error($conn);
    }
}
}   
mysqli_close($conn);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/register.css'>
    <title>Register </title>
    <script type="text/javascript" >
        function clearInputFields()
        {
            document.getElementById("txt1").value="";
            document.getElementById("txt2").value="";
            document.getElementById("rbtn").value="";
            document.getElementById("rbtn1").value="";
            document.getElementById("rbtn2").value="";
            document.getElementById("txt3").value="";
            document.getElementById("txt4").value="";
            document.getElementById("txt5").value="";
        }
    </script>
</head>
<body>
<div class="back-img"> 
        <div class="content">
            <form action="register.php" method="post" class="form1" >
                <h2>Register new account</h2><br><br>
                
                <h4>Enter name: </h4>
                <input class="inputbox" type="text" id="txt1" name="txtname"><br><br>
                <h4>Enter contact number: </h4>
                <input class="inputbox" type="text" id="txt2" name="txtnum"><br><br>
                <h4>Enter gender:</h4> 
                    <h4><input type="radio" name="rd1" class="radio" value="M"> Male
                    &nbsp; &nbsp;<input type="radio" name="rd1" class="radio" value="F"> Female
                    &nbsp;&nbsp;<input type="radio" name="rd1" class="radio" value="O"> Other</h4><br>
                <h4>Enter address: </h4>
                <input class="inputbox" type="text" id="txt3" name="txtadd"><br><br>
                <h4>Enter username: </h4>
                <div <?php if(isset($uname_err)):?> class="errmsg" <?php endif ?> ><?php if(isset($uname_err)) { echo $uname_err;} ?></div>
                <input class="inputbox" type="text" id="txt4" name="txtuname" ><br><br>
                <h4>Enter password: </h4>
                <input class="inputbox" type="password" id="txt5" name="txtpass"><br><br><br>
                <input type="submit" id="sub1" name="register" class="submit" value="register">&nbsp;
               <input type="reset" id="res1" name="reset" class="reset" ><br><br>
               <h4>&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Already registered? <a class="loginlink" href="login.php">Login here</a></h4>
            </form>
        </div>
        <br><br>      
</div> 
</body>
</html>

