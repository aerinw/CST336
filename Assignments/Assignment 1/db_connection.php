<?php

$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 

//establishes database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>