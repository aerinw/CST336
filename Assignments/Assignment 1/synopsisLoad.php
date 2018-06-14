<?php

$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    

         $sql = "SELECT * 
         		FROM books 
                WHERE id = " . 12; //$_GET['zip_code']
         $stmt = $dbConn->query($sql);
         $results = $stmt->fetchAll();
         
         echo "{";
         foreach ($results as $record){
             echo "\"id\":" . "\"" . $record['id'] . "\",";
             echo "\"title\":" . "\"" . $record['title'] . "\"," ;
             echo "\"synopsis\":" . "\"" . $record['synopsis'] . "\"" ;

              ;
         }
         echo "}";

?>