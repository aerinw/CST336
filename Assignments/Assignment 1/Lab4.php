<?php

//variables for db connection
$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //db connection

//connection error
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//create query
$sql = "SELECT teamName, stadiumId 
        FROM nfl_team 
        ORDER BY teamName ASC";

$stmt = $dbConn -> prepare($sql); 
$stmt -> execute(); 
$teamNames = $stmt->fetchAll(); //put query results into array

//if there is a team selected
if(isset($_GET['stadiumId'])){
  $stadiumId = $_GET['stadiumId'];
  $sql = "SELECT * 
        FROM nfl_stadium 
        WHERE stadiumId = :stadiumId";

   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array (':stadiumId' => $stadiumId));
   $stadInfo = $stmt->fetch(); //put query results into array
}

//query for top five states
$topFiveSql = "SELECT fl as state, sum(capacity) as total_capacity
	FROM nfl_stadium
	GROUP BY fl
	ORDER BY total_capacity DESC
	LIMIT 5";
$topFiveStmt = $dbConn -> prepare($topFiveSql);
$topFiveStmt -> execute();
$topFiveRecords = $topFiveStmt->fetchAll();

//query for Team and stadium list
$teamListSql = "SELECT teamName, stadiumName, fl 
	FROM nfl_team t
	JOIN nfl_stadium s ON t.stadiumId = s.stadiumId
	ORDER BY teamName";
$teamListStmt = $dbConn -> prepare($teamListSql);
$teamListStmt -> execute();
$teamListRecords = $teamListStmt->fetchAll();

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab 4</title>
		<meta name="description" content="">
		<meta name="author" content="Ashley Wallace">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="css/hpStyleSheet.css">
	</head>

	<body>
		<div class="mainDiv">	
		<div align="center">		
		<h1> NFL Teams & Stadiums Queries </h1>
        <form>
         <select name="stadiumId">
           <option value="-1"> - Select Team -</option>
           <?php
                foreach ($teamNames as $team) {
                	//return stadiumId but show team name
                    echo "<option  value=" . $team['stadiumId'] . ">" . $team['teamName'] . "</option>";
                             
                }         
             
           ?>   
         </select>
         <input type="submit" value="Get Stadium Info!" />
        </form>
       <?php
        if (isset($stadInfo) && !empty($stadInfo)) {
            echo "<span>" . $stadInfo['stadiumName'] . "</span><br>";
            echo "<span>" . $stadInfo['streat'] . "</span><br>";
            echo "<span>" . $stadInfo['city'] . " " . $stadInfo['fl'] . " " . $stadInfo['zip']  . "</span> <br>";
        }
        ?>
        
                <h2>Top 5 States Sorted By Stadium Capacity</h2>
        <?php
          foreach($topFiveRecords as $record){
          	//return state and capacity
          	echo "<span>" . $record['state'] . " - " . $record['total_capacity'] . "</span><br>";
          }
        ?>
        
                <h2>List All Teams With Their Stadium</h2>
        <?php
          foreach($teamListRecords as $team){
          	//return team and stadium
          	echo "<span>" . $team['teamName'] . " - " . $team['stadiumName'] . " - " . $team['fl'] . "</span><br>";
          }
        ?>
        
        
        </div>
		</div>
	</body>
</html>
