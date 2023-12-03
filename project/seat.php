<?php 
include('config.php');
$rid = $_GET['rid'];

echo '<script type="text/javascript"> ';
echo 'var rs = prompt("Please enter your Required Seat", "");'; 
echo "document.location = 'book_now.php?rseat='+rs+'&Rideid='+$rid+''; </script>"; 
?>