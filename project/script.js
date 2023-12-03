var form1=document.getElementById('form1');
    var form2=document.getElementById('form2');
    var form3=document.getElementById('form3');
    var next1=document.getElementById('next1');
    
    var next2=document.getElementById('next2');
    var back1=document.getElementById('back1');
    var back2=document.getElementById('back2');
   next1.onclick=function()
   {
    form1.style.left="-420px";
   }
   var scr=document.getElementById("form1");
   var datetoday=new Date();
    var tdate=datetoday.getDate();
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
    var date2=new Date();

    var maxdate=date2.getDate();
    var maxmonth=date2.getMonth()+1;
    var maxyear=date2.getUTCFullYear();
    while($resRidePost=mysqli_fetch_assoc($ridequery))
        {
    echo
        '<div class="content">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td class="tdnm">
                            <h4>Name: </h4>
                        </td>
                        <td class="tdres">
                            <h4> '.$resRidePost['Name'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Contact: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Contact'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Gender: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.resRidePost['Gender'].' </h4>
                        </td>$
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Age: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Age'].'</h4>
                        </td>
                    </tr>

                    <tr>
                        <td class="tdnm">
                            <h4>Post Date: </h4>
                        </td>
                        <td class="tdres">
                            <h4> '.$resRidePost['Created_on'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Journey Date: </h4>
                        </td>
                        <td class="tdres">
                            <h4> '.$resRidePost['Travel_Date'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Journey Time: </h4>
                        </td>
                        <td class="tdres">
                            <h4> '.$resRidePost['Travel_Time'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Seats Available: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Seats_Available'].' </h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Source City: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$fetchSourceCity['City_Name'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Destination city: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$fetchDestCity['City_Name'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Luggage per person: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['LuggagePer'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Fare per person: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Fare'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Car Name: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Car_Name'].' </h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Car Number: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Car_Number'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Capacity: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Capacity'].' </h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Car Type: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Car_Type'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdnm">
                            <h4>Luggage capacity: </h4>
                        </td>
                        <td class="tdres">
                            <h4>'.$resRidePost['Luggage'].'</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button id="delete" class="del-btn" name="deletepost"> Delete  Post</button>
                    
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>';
        
    } 
   } ?>