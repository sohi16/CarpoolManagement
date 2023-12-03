<?php
require_once('header.php');
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

        <div class="content">

            <form action="post_ride4.php" method="post" id="form3">
                <div class="part part-3 active">
                    <div class="form-group">
                        <h2>Car Details</h2><br>
                        <h4>Enter name: </h4><input class="inputbox" type="text" id="txt1" name="txtname"><br><br>
                        <h4>Enter contact number: </h4><input class="inputbox" type="text" id="txt2"
                            name="txtnum"><br><br>
                        <h4>Enter gender:</h4>
                        <h4><input type="radio" name="rd1" class="radio" value="M"> Male
                            &nbsp; &nbsp;<input type="radio" name="rd1" class="radio" value="F"> Female
                            &nbsp;&nbsp;<input type="radio" name="rd1" class="radio" value="O"> Other</h4><br>
                        <h4>Enter username: </h4>
                        <input class="inputbox" type="text" id="txt4" name="txtuname"><br><br>
                        <h4>Enter age: </h4><input class="inputbox" type="password" id="txt5" name="txtpass"><br><br>
                        <h4>Upload license: </h4><input class="inputbox" type="file" id="txt5"
                            name="txtlicense"><br><br>
                        <h4>Upload photo: </h4><input class="inputbox" type="file" id="txt5" name="txtlicense"><br>
                    </div>
                    <div class="btn-box">
                        <button class="back-btn" id="back2">Back</button>
                        <button class="next-btn">Post</button>
                    </div>
                </div>
                </form>

            <div class="step">
                <div id="progress"></div>
                <div class="step-col"><small>Step 1 </small></div>
                <div class="step-col"><small>Step 2 </small></div>
                <div class="step-col"><small>Step 3 </small></div>
            </div>
            
        </div>

    </div>
    