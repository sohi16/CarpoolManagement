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

$selectBooking="SELECT * FROM bookedride WHERE PassengerID='".$_SESSION['id']."' ";
$selqueryBooking=mysqli_query($conn,$selectBooking);
$numBookings=mysqli_num_rows($selqueryBooking);

$selectCityBook="SELECT * FROM bookedride WHERE PassengerID='".$_SESSION['id']."'";
$querySDCity=mysqli_query($conn,$selectCityBook);
$numCitySD=mysqli_fetch_array($querySDCity);

$souscitysel="SELECT City_Name FROM city_details where City_ID='".$numCitySD['Source']."'";
$qscitysel=mysqli_query($conn,$souscitysel);
$fscitysel=mysqli_fetch_array($qscitysel);

$selDestinBook="SELECT City_Name FROM city_details where City_ID='".$numCitySD['Destination']."'";
$queryDestinCty=mysqli_query($conn,$selDestinBook);
$fetchDestin=mysqli_fetch_array($queryDestinCty);

if($numBookings != 0)
{

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_pass.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/booked_rides.css'> 

    <title>Carpool</title>
</head>

<body>
    <div class="back-img">
    <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Rides Booked by <?php echo $_SESSION['uname']; ?></h2>
                <table  class="tabledata" border="1px" cellspacing="3">
                <thead>
                <tr class="tdnm">
                <th >ID</th>
                    <th >Driver Name</th>                 
                    <th >Gender</th>
                    <th >Journey Date:</th>
                    <th >Journey Time</th>
                    <th >Seats Available</th>
                    <th >Source City</th>
                    <th >Destination City</th>
                    <th >Luggage Per person</th>
                    <th >Fare per person</th>
                    <th >Car Name</th>
                    <th >Car Number</th>
                    
                    
                </tr>
            </thead><br><br>
            <tbody>
            <?php
                    while($resFetchBookings=mysqli_fetch_assoc($selqueryBooking))
                    {
                        ?>
                        <tr class="tdnm">
                        <td class="tddata"><?php echo $resFetchBookings['Booking_ID']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['Driver_name']; ?> </td>
                        
                        <td class="tddata"><?php echo $resFetchBookings['Gender']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['TravelDate']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['TravelTime']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['Seats']; ?> </td>
                        <td class="tddata"><?php echo $fscitysel['City_Name']; ?> </td>
                        <td class="tddata"><?php echo $fetchDestin['City_Name']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['Luggage']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['Fare']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['CarName']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookings['CarNumber']; ?> </td>
                        
                        
                                               
                    </tr>
                       <?php 
                }
            ?>
            </tbody>
                </table>
            <?php
}
else{
    echo '<script>alert("not fetched")</script>';
}
            ?> 
            </form>
        </div>
    </div>
</body>

</html>