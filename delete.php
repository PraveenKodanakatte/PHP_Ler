<?php

$conn = mysqli_connect("localhost","root","","firstdata");
error_reporting(0);

$row=$_GET['nm'];
$query="DELETE FROM INFO WHERE NAME = '$row'";

$data=$mysqli_query($conn,$query);

if($data)
{
    echo "Record deleteed from the database";
}
else{
    echo"failed to delete the record";
}
?>