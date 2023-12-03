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
    <div class="content"><br><br><br><br>
    <?php echo "<h2>$welcome</h2>"; ?><br><br><br>
    <button class="btnpassenger" name="passenger"><a href="book.php" class="btnpass" style="text-decoration:none;">Click here to ride as passenger </a></button>
    <br><br><br>
        <div class="container">
            <div>
                <h3>Want to travel out of city? <br><br>Ride with comfort of car at minimum fare! Book your ride now</32>
            </div>
        <div >
        <img src="carpool2.png" class="img">
        </div>
        </div>
    </div>
    
    </div>
</body>

</html>