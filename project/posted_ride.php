<?php
require_once('header_driver.php');
require_once('config.php');
if(isset($_SESSION['uname']))
{
    $welcome="Welcome".$_SESSION['uname']."<br/>";
    
}
else{
    header("Location: login.php");
}
if(isset($_POST['deletepost']))
{
    $deletePost="DELETE FROM ride_details where Member_ID='".$_SESSION['id']."' ";
    $queryDel=mysqli_query($conn,$deletePost);
    if($queryDel)
    {
        echo '<h2><script>alert("RIDE DELETED")</script></h2>';
    }
    else {
        echo '<h2><script>alert("FAILED")</script></h2>';
    }
}
$userid=$_SESSION['id'];

$selecRideDetails="SELECT * FROM ride_details where Member_ID='$userid' ";
$ridequery=mysqli_query($conn,$selecRideDetails);
$resRideTotal=mysqli_num_rows($ridequery);

$selectCityDet="SELECT * FROM ride_details where Member_ID='$userid' ";
$queryCityDet=mysqli_query($conn,$selectCityDet);
$resRidefetch=mysqli_fetch_array($queryCityDet);
 
$selectSourceCity="SELECT City_Name FROM city_details where City_ID='".$resRidefetch['Source_City_ID']."' ";
    $querySourcecity=mysqli_query($conn,$selectSourceCity);
    $fetchSourceCity=mysqli_fetch_array($querySourcecity);

    $selectDestCity="SELECT City_Name FROM city_details where City_ID='".$resRidefetch['Destination_City_ID']."' ";
    $querDestcity=mysqli_query($conn,$selectDestCity);
    $fetchDestCity=mysqli_fetch_array($querDestcity);
if($resRideTotal !=0)
{  

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/postedride.css'>

    <title>Carpool</title>
</head>

<body>
    <div class="back-img">
    <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Rides Posted by <?php echo $_SESSION['uname']; ?></h2>
                <table class="tabledata" border="1px" cellspacing="3">
                <thead>
                <tr >
                    <th >Name</th>
                    <th >Contact</th>
                    <th >Gender</th>
                    <th > Age</th>
                    <th >Post Date:</th>
                    <th >Journey Date:</th>
                    <th >Journey Time</th>
                    <th >Seats Available</th>
                    <th >Source City</th>
                    <th >Destination City</th>
                    <th >Luggage Per person</th>
                    <th >Fare per person</th>
                    <th >Car Name</th>
                    <th >Car Number</th>
                    <th >Capacity</th>
                    <th >Car Type</th>
                    <th >Luggage Capacity</th>
                    <th  colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    while($resRidePost=mysqli_fetch_assoc($ridequery))
                    {
                        ?>
                        <tr >
                        <td><?php echo $resRidePost['Name']; ?> </td>
                        <td><?php echo $resRidePost['Contact']; ?> </td>
                        <td><?php echo $resRidePost['Gender']; ?> </td>
                        <td><?php echo $resRidePost['Age']; ?> </td>
                        <td><?php echo $resRidePost['Created_on']; ?> </td>
                        <td><?php echo $resRidePost['Travel_Date']; ?> </td>
                        <td><?php echo $resRidePost['Travel_Time']; ?> </td>
                        <td><?php echo $resRidePost['Seats_Available']; ?> </td>
                        <td><?php echo $fetchSourceCity['City_Name']; ?> </td>
                        <td><?php echo $fetchDestCity['City_Name']; ?> </td>
                        <td><?php echo $resRidePost['LuggagePer']; ?> </td>
                        <td><?php echo $resRidePost['Fare']; ?> </td>
                        <td><?php echo $resRidePost['Car_Name']; ?> </td>
                        <td><?php echo $resRidePost['Car_Number']; ?> </td>
                        <td><?php echo $resRidePost['Capacity']; ?> </td>
                        <td><?php echo $resRidePost['Car_Type']; ?> </td>
                        <td><?php echo $resRidePost['Luggage']; ?> </td>
                        <td><button id="delete" class="del-btn" name="deletepost"> Delete  Post</button>
                        </td>
                                               
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