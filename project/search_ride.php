<?php
require_once('header_pass.php');
require_once('config.php');
//session_start();
if(isset($_SESSION['uname']))
{
    $welcome="Welcome".$_SESSION['uname']."<br/>";
    
}
else{
    header("Location: login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_pass.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/passenger.css'>

    <title>Carpool</title>
</head>

<body>
    <div class="back-img">

    </div>
</body>

</html>