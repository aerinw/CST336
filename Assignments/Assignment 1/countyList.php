<?php

$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    

          $sql = "SELECT DISTINCT(county) FROM zip_code " .
                " WHERE state = :state AND county !='' ORDER BY county";
         $stmt = $dbConn->prepare($sql);
         $stmt->execute( array (":state"=>$_GET['state']));
         $results = $stmt->fetchAll();
         
         echo "{ \"counties\": [ ";
         foreach ($results as $record){
             echo "{\"county\":" . "\"" . $record['county'] . "\"},";
         }
         echo "{\"county\":" . "\"\"}";
          echo "] }";

?>