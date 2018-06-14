<?php

//variables for db connection
$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //db connection

function getTeams(){
    global $dbConn;
    
    $sql = "SELECT teamId, teamName
            FROM nfl_team
            ORDER BY teamName";
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

function getStadiums(){
    global $dbConn;
    
    $sql = "SELECT stadiumId, stadiumName
            FROM nfl_stadium
            ORDER BY stadiumName";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

if (isset ($_POST['addMatch'])) 
{      
     $sql = "INSERT INTO nfl_match
             (team1_id, team2_id, date)
             VALUES
             (:team1_id, :team2_id, :date)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":team1_id" => $_POST['teamOne'],
                              ":team2_id" => $_POST['teamTwo'],
                              ":date" => $_POST['date']));       
    $matchId = $dbConn->lastInsertId();    
    $sql = "INSERT INTO nfl_recap
            (matchId, recap)
            VALUES
            (:matchId, :recap)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":matchId" => $matchId,
                             ":recap"   => $_POST['recap']));    
    echo "Record was added!";         
 }
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
		<div class="mainDiv" align="center">					
		  <h1> NFL Matches</h1>	
      	  <form method="post">
          <span>Team 1: </span>
          <select name="teamOne">   
              <?php 
              $teams = getTeams();                        
              foreach ($teams as $team) 
              {
                   echo "<option value='" . $team['teamId'] . "' >" . $team['teamName'] . "</option>";
              }              
              ?>
          </select><br />          
          <span>Team 2:</span>
          <select name="teamTwo">
              <?php
              foreach ($teams as $team) 
              {
                   echo "<option value='" . $team['teamId'] . "' >" . $team['teamName'] . "</option>";
              }               
              ?>
          </select><br />
          <span>Date:</span>
          <input type="date" name="date"><br />
          <textarea name="recap" rows="10" cols="50" placeholder="Enter Recap Text Here"></textarea><br />
          <input type="submit" name="addMatch" value="Add Match">
          </form>
          
          <h2> NFL Stadiums </h2>
          
          <?php   
          $stadiumList = getStadiums();    
          foreach ($stadiumList as $stadium) { 
          ?>        
          <span><?=$stadium['stadiumName']?></span>
          <form action="updateStadium.php" method="post">
             <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId']?>">
             <input type="submit" name="update" value="Update">
          </form>
          <form method="post" onsubmit="'<?=$stadium['stadiumName']?>'" >
              <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId']?>">            
              <input type="submit" name="delete" value="Delete">
          </form>
          <br />
          <? } ?>       
        </div>  
	</body>
</html>
