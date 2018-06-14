<?php

$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    

          $sql = "SELECT title AS book, id
                 FROM books 
                 ORDER BY title ASC";
         $stmt = $dbConn->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchAll();
         
         echo "{ \"bookTitles\": [ ";
         foreach ($results as $record){
             echo "{\"book\":\"" . $record['book'] . "\", \"id\":\"" . $record['id'] . "\"},";
         }
         echo "{\"book\":\"\", \"id\":\"\"}";
         echo "] }";

?>