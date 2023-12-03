<?php
require_once('header_driver.php');

// session_start();
if(isset($_SESSION['uname']))
{
    $welcome="Welcome".$_SESSION['uname']."<br/>";
    require_once('config.php');
}
else{
    header("Location: login.php");
}
$sql2="SELECT * FROM `city_details` ";
$all_city=mysqli_query($conn,$sql2);

$sqldes="SELECT * FROM `city_details` ";
$all_city_des=mysqli_query($conn,$sqldes);
$nmerr=$conerr=$conerr2=$generr=$ageerr=$uname_errmatch="";

$chkUname="SELECT Reg_ID FROM registration WHERE Username='".$_SESSION['uname']."' ";
$chkres=mysqli_query($conn,$chkUname);
$chkRegid=mysqli_fetch_array($chkres);

$sqlSelect="SELECT `Reg_ID` FROM `registration` WHERE `Username`='".$_SESSION['uname']."' ";
$regid =mysqli_query($conn,$sqlSelect);
$reg=mysqli_fetch_array($regid);

$datetoday=date('Y-m-d');

if(isset($_POST['submitpost']))
{
    $filename= isset($_FILES["txtlicense"]["name"]);
    $filetmpname= isset($_FILES["txtlicense"]["tmp_name"]);
    $folder="images/".$filename;
    move_uploaded_file($filetmpname,$folder);
    $filename2=isset($_FILES["txtphoto"]["name"]);
    $filetmpname2=isset($_FILES["txtphoto"]["tmp_name"]);
    $folder2="images/".$filename2;
    move_uploaded_file($filetmpname2,$folder2);
    
    $flag=1;
     if(empty($_POST['txtname']))
    {
        $flag=0;
        $nmerr="Fill name and only alphabets and whitespace allowed for name";
    }
    if(empty($_POST['txtnum']))
    {$flag=0;
        $conerr="Fill contact and only numbers allowed";
    }
    if(strlen($_POST['txtnum'])<10 && strlen($_POST['txtnum'])>10)
    {$flag=0;
        $conerr2="Contact number should be 10 digits";
    }
    if(empty($_POST['rd1']))
    {$flag=0;
        $generr="Enter gender";
    }
    if(empty($_POST['txtage']))
    {$flag=0;
        $ageerr="Enter age greater than 18";
    }
    
    if($flag==1)
    {  
    $mname=$_POST['txtname'];
    $mcontact=$_POST['txtnum'];
    $mgender=$_POST['rd1'];
    $muname=$_POST['txtuname'];
    $mage=$_POST['txtage'];
    
    $cdate=$_POST['txtdate'];
    $jtime=$_POST['txttime'];
    $ttime=$_POST['txtjtime'];
    $seat=$_POST['txtseat'];
    $scity=$_POST['txtscity'];
    $dcity=$_POST['txtdcity'];
    $luggage=$_POST['txtluggage'];
    $fare=$_POST['txtfare'];

    $cname=$_POST['txtcname'];
    $cnnum=$_POST['txtcnum'];
    $capacity=$_POST['txtcapacity'];
    $ctype=$_POST['txttype'];
    $lugcap=$_POST['txtlugcap'];
    
    $sqlRide="INSERT INTO `ride_details` (`Name`,`Contact`,`Gender`,`Member_ID`,`Age`,`License`,`Photo`,`Created_on`,
    `Travel_Date`,`Travel_Time`,`Seats_Available`,`Source_City_ID`,`Destination_City_ID`,`LuggagePer`,`Fare`,`Car_Name`,`Car_Number`,`Capacity`,
    `Car_Type`,`Luggage`) 
    VALUES('$mname','$mcontact','$mgender','$muname','$mage','$filename','$filename2','$cdate','$jtime','$ttime',
    '$seat','$scity','$dcity','$luggage','$fare','$cname','$cnnum','$capacity','$ctype','$lugcap')";
    $resRide=mysqli_query($conn,$sqlRide);
    }
    if($resRide)
    {
        echo '<h2><script>alert("RIDE POSTED")</script></h2>';
        
    }
    else
    {
        echo '<script>alert("not inserted")</script>';
    }
   
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/postride.css'>
    
    <title>Carpool</title>
</head>

<body>
    <div class="back-img">
        <?php echo $welcome; ?>
        <div class="content">
            <div class="title">
                <h3>Fill Details To Post Your Ride</h3>
            </div>
            <form action="" method="post"  enctype="multipart/form-data" class="formgrp"><br>
                <div class="part part-1 active" id="form1"><br>
                       <h2>Personal Details</h2><br>
                        <h4>Member ID: </h4>
                        <input class="inputbox" type="text" id="txt4" name="txtuname" value="<?php 
                        echo $chkRegid['Reg_ID'];?>"><br><br>
                        <h4>Enter driver name: </h4><?php echo $nmerr; ?><input class="inputbox" type="text" id="txt1"
                            name="txtname"><br><br>
                        <h4>Enter contact number: </h4><?php echo $conerr; echo $conerr2;?><input class="inputbox"
                            type="text" id="txt2" name="txtnum"><br><br>
                        <h4>Enter gender:</h4><?php echo $generr; ?>
                        <h4><input type="radio" name="rd1" class="radio" value="M"> Male
                            &nbsp; &nbsp;<input type="radio" name="rd1" class="radio" value="F"> Female
                            &nbsp;&nbsp;<input type="radio" name="rd1" class="radio" value="O"> Other</h4><br>

                        <h4>Enter age: </h4><?php echo $ageerr; ?><input class="inputbox" type="text" id="txt5"
                            name="txtage"><br><br>
                        <h4>Upload license: </h4><input class="inputbox" type="file" id="txt5"
                            name="txtlicense"><br><br>
                        <h4>Upload photo: </h4><input class="inputbox" type="file" id="txt5" name="txtphoto"><br>
                    
                </div>
                <div class="part part-2 active" id="form2"><br>
                    <h2>Travel Details</h2><br>
                        <h4>Ride posted on: </h4><input class="inputbox" type="text" id="txtdate"
                            name="txtdate" value="<?php echo $datetoday; ?>"><br><br>
                        <h4>Enter Journey Date & Time: </h4><input class="inputboxdt" type="date" id="txttime"
                            name="txttime" min=""><input class="inputboxdttime" type="time" id="txtjtime"
                            name="txtjtime"><br><br>
                        <h4>Seats Available:</h4><input class="inputbox" type="text" id="txt3" name="txtseat"><br><br>
                        <h4>Source City: </h4>
                        <select name="txtscity" id="role" class="city">
                            <?php
                            while($city=mysqli_fetch_array($all_city,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $city["City_ID"];
                                    ?>"><?php echo $city["City_Name"]; ?></option>
                            <?php
                        endwhile;?>

                        </select><br><br>
                        <h4 class="dest">Destination City: </h4>
                        <select name="txtdcity" id="city2" class="city2">
                            <?php
                            while($cityd=mysqli_fetch_array($all_city_des,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $cityd["City_ID"];
                                    ?>"><?php echo $cityd["City_Name"]; ?></option>
                            <?php
                        endwhile;?>

                        </select><br><br>
                        <h4>Luggage Per Person: </h4><input class="inputbox" type="text" id="txt5"
                            name="txtluggage"><br><br>
                        <h4>Fare Per Person: </h4><input class="inputbox" type="text" id="txt5" name="txtfare"><br>
                    
                </div>
             <div class="part part-3 active" id="form3"><br>
                        <h2>Car Details</h2><br>

                        <h4>Car name: </h4><input class="inputbox" type="text" id="txt1" name="txtcname"><br><br>
                        <h4>Car number: </h4><input class="inputbox" type="text" id="txt2" name="txtcnum"><br><br>
                        <h4>Capacity:</h4>
                        <input class="inputbox" type="text" id="txt2" name="txtcapacity"><br><br>
                        <h4>Car Type: </h4>
                        <input class="inputbox" type="text" id="txt4" name="txttype"><br><br>
                        <h4>Luggage capacity: </h4><input class="inputbox" type="text" id="txt5"
                            name="txtlugcap"><br><br>
                            
                </div>
                <div class="btn-box">
                        <button id="next1" class="next-btn" name="submitpost"><a href="" class="sub"> Submit </a></button>
                        <!-- <button id="next1" class="next-btn" name="viewpost"><a href="" class="sub"> View post </a></button> -->
                    </div>  
            </form>
        </div>
        <script type="text/javascript">
    var datetoday=new Date();
    var tdate=datetoday.getDate()+1;
    var tmonth=datetoday.getMonth()+1;
    if(tmonth<10)
    {
        tmonth="0"+tmonth;

    }
    if(tdate <10)
    {
        tdate="0"+tdate;
    }
    var tyear=datetoday.getUTCFullYear();
    var minDate= tyear + "-" + tmonth+ "-" +tdate;
    document.getElementById("txttime").setAttribute('min',minDate);
     
    var mdate=datetoday.getDate()+8;
    var m_month=datetoday.getMonth()+1;
    if(mdate<10)
    {
        mdate="0"+mdate;
    }
    if(m_month<10)
    {
        m_month="0"+m_month;
    }
    var myear=datetoday.getUTCFullYear();
    var maxDate= myear + "-" + m_month +"-" + mdate;
    document.getElementById("txttime").setAttribute('max',maxDate);
</script>
        <div class="content2" id="content2">
        
        <?php if(isset($_POST['submitpost'])){  
             $sqlSel="SELECT City_Name FROM city_details where City_ID=$scity ";
             $scityQuery=mysqli_query($conn,$sqlSel);
             $scitynm=mysqli_fetch_array($scityQuery);
             
             $sqlSelDes="SELECT City_Name FROM city_details where City_ID=$dcity ";
             $dcityQuery=mysqli_query($conn,$sqlSelDes);
             $dcitynm=mysqli_fetch_array($dcityQuery);
         
             
            echo '<table class="table">
        <tr>
            <td>
                <h4>Name: </h4>
            </td>
            <td class="td">
                <h4>'.$mname.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Contact: </h4>
            </td>
            <td class="td">
                <h4>'.$mcontact.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Gender: </h4>
            </td>
            <td class="td">
                <h4>'.$mgender.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Age: </h4>
            </td>
            <td class="td">
                <h4>'.$mage.' </h4>
            </td>
        </tr>
        
        <tr>
            <td>
            <h4>Post Date: </h4>
            </td>
            <td class="td">
                <h4>'.$cdate.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Journey Time: </h4>
            </td>
            <td class="td">
                <h4>'.$ttime.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Journey Date: </h4>
            </td>
            <td class="td">
                <h4>'.$jtime.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Seats Available: </h4>
            </td>
            <td class="td">
                <h4>'.$seat.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Source City: </h4>
            </td>
            <td class="td">
                <h4>'.$scitynm["City_Name"].' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Destination city: </h4>
            </td>
            <td class="td">
                <h4>'.$dcitynm["City_Name"].' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Luggage per person: </h4>
            </td>
            <td class="td">
                <h4>'.$luggage.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Fare per person: </h4>
            </td>
            <td class="td">
                <h4>'.$fare.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Car Name: </h4>
            </td>
            <td class="td">
                <h4>'.$cname.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Car Number: </h4>
            </td>
            <td class="td">
                <h4>'.$cnnum.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Capacity: </h4>
            </td>
            <td class="td">
                <h4>'.$capacity.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Car Type: </h4>
            </td>
            <td class="td">
                <h4>'.$ctype.' </h4>
            </td>
        </tr>
        <tr>
            <td>
            <h4>Luggage capacity: </h4>
            </td>
            <td class="td">
                <h4>'.$lugcap.' </h4>
            </td>
        </tr>
    
    </table>'; } ?>
        </div>
    </div>
</body>

</html>