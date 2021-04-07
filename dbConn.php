<?php

$db = mysqli_connect("localhost","root","","firstdata");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>