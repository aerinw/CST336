<?php

$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    	$id = $_POST['id'];

        $sql = "SELECT synopsis FROM books
                 WHERE id = " . $id ; 
        
		$stmt = $dbConn->query($sql);
        $results = $stmt->fetchAll();
         
         foreach ($results as $record)
         {
         echo $record['synopsis'];
         }

?>