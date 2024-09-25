<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "biljkedb";

$connection = mysqli_connect($serverName,$username,$password,$dbName);
if($connection == FALSE)
{
    echo "Neuspesno povezivanje";
}
