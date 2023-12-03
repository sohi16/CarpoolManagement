<?php 
include('registerDetails.php');
if(count($errors)>0):
echo'<div clas="error">
        foreach($errors as $error) 
            <p> $error; </p>
        endforeach 
</div>';
endif 
?>