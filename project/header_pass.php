<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_pass.css'>
    <title>Document</title>
</head>
<body>
<nav>
        <div class="logo">Rideshare City</div>
        <ul>          
            <li><a href="index.php">Home</a></li>
            <li><a href="search_ride.php">Search ride</a></li>
            <li><a href="book.php">Book ride</a></li> <!-- display all rides -->
            <li><a href="booked_rides.php">Booked rides</a></li>
            <li><a href="driver_home.php">Driver home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><?php session_start(); if(isset($_SESSION['uname'])) {echo "<a href='logout.php' >Logout</a>";} ?></li>           
        </ul> 
    </nav>     
</div>
</body>
</html>