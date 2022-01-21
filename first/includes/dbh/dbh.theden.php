<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "theden";

$conn_tdc = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if(!$conn_tdc){
    die("Connection failed: " . mysqli_connect_error());
}