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

$rseat = $_GET['rseat'];
$Rideid = $_GET['Rideid'];
$membid=$_SESSION['id'];

$dr = "SELECT * from ride_details where Ride_ID=$Rideid";
$showdr = mysqli_query($conn,$dr);
$arrdata = mysqli_fetch_assoc($showdr);

$drname = $arrdata['Name'];
$contnum = $arrdata['Contact'];
$gen = $arrdata['Gender'];
$drage = $arrdata['Age'];
$ridedt=$arrdata['Travel_Date'];
$ridedid=$arrdata['Member_ID'];
$ridetime = $arrdata['Travel_Time'];
$rideseats = $arrdata['Seats_Available'];
$sourceC=$arrdata['Source_City_ID'];
$destinationC=$arrdata['Destination_City_ID'];
$perlug=$arrdata['LuggagePer'];
$fareride=$arrdata['Fare'];
$carname=$arrdata['Car_Name'];
$carnumber=$arrdata['Car_Number'];


if($rseat>0 && $rseat<=$arrdata['Seats_Available']){
    $ridebooking= "INSERT INTO `bookedride` (`Driver_name`, `Gender`, `TravelDate`, `TravelTime`, `Seats`, `Source`, `Destination`,`Luggage`,`Fare`,
    `CarName`,`CarNumber`,`RideID`,`PassengerID`,`Driver_ID`) 
    VALUES('$drname', '$gen', '$ridedt', '$ridetime', '$rseat', '$sourceC', '$destinationC', '$perlug','$fareride','$carname','$carnumber','$Rideid','$membid','$ridedid')";
   $bookquery=mysqli_query($conn,$ridebooking);
    $fseat = $arrdata['Seats_Available'] - $rseat;
    
    $queryUpd = "UPDATE ride_details set  `Seats_Available`='$fseat' where Ride_ID=$Rideid; ";
    $q = mysqli_query($conn, $queryUpd);
    
    if($bookquery && $q)
    {
        echo '<script type="text/javascript"> '; 
        echo "document.location = 'booked_rides.php'; </script>"; 
    }
    else{
        echo '<h2><script>alert("not booked")</script></h2>';   
    }
    
    }
    else{
        echo "<script type=\'text/javascript\'>\n";
        echo "alert('Required seat is greater than available seat or You have entered less than 1 number of seat.');\n";
        echo "window.location = ('book.php');\n";
        echo "</script>";
    
    }
    
    ?>