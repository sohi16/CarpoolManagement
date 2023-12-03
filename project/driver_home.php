<?php
require_once('header_driver.php');
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
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_driver.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/driver.css'>

    <title>Carpool</title>
</head>

<body>
    <div class="back-img">
    <div class="content"><br><br><br><br>
    <?php echo "<h2>$welcome</h2>"; ?><br><br><br>
    
    <button class="btnpassenger1" name="passenger"><a href="post_ride.php" class="btnpass1" style="text-decoration:none;">Click here to ride as driver </a></button>
    <br><br><br>
        <div class="container1">
            <div>
                <h3>Travelling with your car out of city? <br><br> Share your ride and earn while travelling! Post your ride now</32>
            </div>
        <div >
        <img src="carpool5.png" class="img1">
        </div>
        </div>
    </div>
    </div>
</body>

</html>