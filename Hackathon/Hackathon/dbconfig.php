<?php
$con = new mysqli("localhost","root","","hackathon");
if($con->connect_errno)
{
    echo $con->connect_error;
    die();
}
else{
    echo "connection is successful";
}
?>