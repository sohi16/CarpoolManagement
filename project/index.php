<?php
    require_once('header.php');
    require_once('config.php');
    $sqlSelectICity="SELECT * from city_details";
    $querICity=mysqli_query($conn,$sqlSelectICity);

    $sqlSelectIDC="SELECT * from city_details";
    $queryIDC=mysqli_query($conn,$sqlSelectIDC);

    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="back-img">

        <div class="content">
            <div class="toptext">
                <h2 class="top">Pick rides for your journey at minimum rates <br>Earn by sharing your car </h2>
            </div><br><br>
            <div class="homecontent">

                <form class="form1">
                    <h2 class="text">Search Ride for your destination</h2>
                    <select name="txtscity" id="role" class="inputbox">
                            <?php
                            while($citysource=mysqli_fetch_array($querICity,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $citysource["City_ID"];
                                    ?>"><?php echo $citysource["City_Name"]; ?></option>
                            <?php
                        endwhile;?>
                        
                        </select>
                        &nbsp;&nbsp;
                        <select name="txtdcity" id="city2" class="inputbox">
                            <?php
                            while($citydesindex=mysqli_fetch_array($queryIDC,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $citydesindex["City_ID"];
                                    ?>"><?php echo $citydesindex["City_Name"]; ?></option>
                            <?php
                        endwhile;?>
                    </select><br><br>
                    <input type="date" class="inputbox" id="txtdate" name="date" placeholder=" enter journey date">&nbsp
                    &nbsp
                    <input type="number" class="inputbox" id="txtnump" name="nump"
                        placeholder=" number of persons"><br><br><br><br>
                    <input type="button" id="btnsrch" name="search" class="btnsearch" value="search">
                </form>
            </div>
            <img src="purplecar2.png" class="image">
        </div>
    </div>
    
</body>
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
    document.getElementById("txtdate").setAttribute('min',minDate);
     
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
    document.getElementById("txtdate").setAttribute('max',maxDate);
</script>
</html>
