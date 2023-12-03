<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_driver.css'>
    <title>Document</title>
</head>
<body>
<nav>
        <div class="logo">Rideshare City</div>
        <ul>          
            <li><a href="index.php">Home</a></li>
            <li><a href="post_ride.php">Post ride</a></li>
            <li><a href="posted_ride.php">View posts</a></li> <!-- display all rides -->
            <li><a href="ride_booked.php">Bookings</a></li>
            <li><a href="passenger_home.php">Passenger home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><?php session_start(); if(isset($_SESSION['uname'])) {echo "<a href='logout.php' >Logout</a>";} ?></li>           
        </ul> 
    </nav>     
</div>
</body>
</html>