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
    <link rel='stylesheet' type='text/css' media='screen' href='css/book.css'> 

    <title>Carpool</title>
</head>

<body>
    <div class="back-img">
            <?php $selectAll="SELECT * from ride_details where Member_ID != '".$_SESSION['id']."' ";
                $selectAllQuery=mysqli_query($conn,$selectAll);
                $numAll=mysqli_num_rows($selectAllQuery);
                
            

                $selectFromCity="SELECT * FROM city_details where ";
            echo '<div id="tbl1" class="bookcontent">
            <h2>available rides</h2>';
            if($numAll != 0)
            { echo
                '<table class="tabledata" border="1px" cellspacing="3">
                    <tr class="trdata">
                    <th>Ride id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Journey Date</th>
                    <th>Time</th>
                    <th>Seats available</th>
                    <th>Source City</th>
                    <th>Destination City</th>
                    <th>Luggage Per Person</th>
                    <th>Fare per person</th>
                    <th>Car name</th>
                    <th>Car number</th>
                    <th>Book Ride</th>
                    
                    </tr>';
                    while($resAll=mysqli_fetch_assoc($selectAllQuery) )
                    {
                echo 
                    '<tr class="trdata">
                        <td class="tddata">'.$resAll['Ride_ID'].'</td>
                        <td class="tddata">'.$resAll['Name'].'</td>
                        <td class="tddata">'.$resAll['Contact'].'</td>
                        <td class="tddata">'.$resAll['Gender'].'</td>
                        <td class="tddata">'.$resAll['Age'].'</td>
                        <td class="tddata">'.$resAll['Travel_Date'].'</td>
                        <td class="tddata">'.$resAll['Travel_Time'].'</td>
                        <td class="tddata">'.$resAll['Seats_Available'].'</td>
                        <td class="tddata">'.$resAll['Source_City_ID'].'</td>
                        <td class="tddata">'.$resAll['Destination_City_ID'].'</td>
                        <td class="tddata">'.$resAll['LuggagePer'].'</td>
                        <td class="tddata">'.$resAll['Fare'].'</td>
                        <td class="tddata">'.$resAll['Car_Name'].'</td>
                        <td class="tddata">'.$resAll['Car_Number'].'</td>
                        <td class="tddata"><button id="book" class="book-btn" name="bookpost"> <a href="seat.php?rid='.$resAll['Ride_ID'].' ">
                        Book Ride</button></a></td>
                        
                    </tr>';
                    }
            }
                echo '</table>
            </div>'; ?>
    </div>
</body>

</html>