<?php
session_start();
if(isset($_SESSION['uname']))
{
    session_destroy();
    echo "<script>location.href='index.php'</script>";
}
else{
    header("Location: login.php");
}
?>