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
$showBookingDet="SELECT * FROM `bookedride` where Driver_ID='".$_SESSION['id']."' ";
$queryBookingDet=mysqli_query($conn,$showBookingDet);
$numShowBookArr=mysqli_num_rows($queryBookingDet);

$getPassenger="SELECT * FROM `bookedride`";
$queryGetPasss=mysqli_query($conn,$getPassenger);
$fetchGetPass=mysqli_fetch_array($queryGetPasss);

$detailsPassenger="SELECT * FROM `registration` where Reg_ID='".$fetchGetPass['PassengerID']."' ";
$queryDetailsPass=mysqli_query($conn,$detailsPassenger);
$fetchArray=mysqli_fetch_assoc($queryDetailsPass);
$passname=$fetchArray['Name'];
$passgen=$fetchArray['Gender'];
$passcont=$fetchArray['Contact'];

$getCityDetailsS="SELECT City_Name from city_details where City_ID='".$fetchGetPass['Source']."' ";
$queryGetCityS=mysqli_query($conn,$getCityDetailsS);
$fetchCitySArray=mysqli_fetch_array($queryGetCityS);

$getCityDetD="SELECT City_Name from city_details where City_ID='".$fetchGetPass['Destination']."' ";
$queryCityDetD=mysqli_query($conn,$getCityDetD);
$fetchCityDArray=mysqli_fetch_array($queryCityDetD);

if($numShowBookArr !=0)
{


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/header_driver.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/ride_booked.css.css'>

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
                
                    <th >Ride_ID</th>                 
                    <th >Passenger_ID</th>
                    <th >Passenger Name</th>
                    <th >Gender</th>
                    <th >Contact</th>
                    <th >Journey Date</th>
                    <th >Journey Time</th>
                    <th >Source City</th>
                    <th >Destination City</th>
                    
                
                </tr>
            </thead><br><br>
            <tbody>
            <?php
                    while($resFetchBookingsD=mysqli_fetch_assoc($queryBookingDet))
                    {
                        ?>
                        <tr class="tdnm">
                        <td class="tddata"><?php echo $resFetchBookingsD['RideID']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookingsD['PassengerID']; ?> </td>
                        
                        <td class="tddata"><?php echo $passname; ?> </td>
                        <td class="tddata"><?php echo $passgen; ?> </td>
                        <td class="tddata"><?php echo $passcont; ?> </td>
                        
                        <td class="tddata"><?php echo $resFetchBookingsD['TravelDate']; ?> </td>
                        <td class="tddata"><?php echo $resFetchBookingsD['TravelTime']; ?> </td>
                        <td class="tddata"><?php echo $fetchCitySArray['City_Name']; ?> </td>
                        <td class="tddata"><?php echo $fetchCityDArray['City_Name']; ?> </td>
                        
                        
                        
                                               
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