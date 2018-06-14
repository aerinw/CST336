<?php

//db connection info
$host     = "localhost";
$dbname   = "wala6870"; 
$username = "wala6870"; 
$password = "KnPFGuZvM92EDDch"; 
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //db connection

//connection error
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

function getReportOne()
{
	global $dbConn;
	$sql = "SELECT * 
			FROM  m_students  
			WHERE  gender =  'F' 
			ORDER BY  lastName";
	$stmt = $dbConn -> prepare($sql); 
	$stmt -> execute(); 
	$results = $stmt->fetchAll();
	
	return $results;
}

function getReportTwo()
{
	global $dbConn;
	$sql = "SELECT s.firstName, s.lastName, g.grade
			FROM m_students as s
			LEFT JOIN m_gradebook as g
			on s.studentId = g.studentID
			WHERE g.grade < 50 
			ORDER BY g.grade";
	
	$stmt = $dbConn -> prepare($sql); 
	$stmt -> execute(); 
	$results = $stmt->fetchAll();
	
	return $results;
}

function getReportThree()
{
	global $dbConn;
	$sql = "SELECT a.title, a.dueDate
			FROM m_assignments AS a
			LEFT JOIN m_gradebook AS g ON a.assignmentId = g.assignmentId
			WHERE g.recordId IS NULL ";
	
	$stmt = $dbConn -> prepare($sql); 
	$stmt -> execute(); 
	$results = $stmt->fetchAll();
	
	return $results;
}

function getReportFour()
{
	global $dbConn;
	$sql = "SELECT s.firstName, s.lastName, a.title, g.grade
			FROM m_students AS s
			LEFT JOIN m_gradebook AS g ON s.studentId = g.studentId
			LEFT JOIN m_assignments AS a ON a.assignmentId = g.assignmentId
			ORDER BY s.lastName, a.title";
	
	$stmt = $dbConn -> prepare($sql); 
	$stmt -> execute(); 
	$results = $stmt->fetchAll();
	
	return $results;
}

function getReportFive()
{
	global $dbConn;
	$sql = "SELECT s.firstName, s.lastName, AVG( g.grade ) AS average
		FROM m_students AS s
		LEFT JOIN m_gradebook AS g ON s.studentId = g.studentId
		GROUP BY s.firstName, s.lastName
		ORDER BY AVG( g.grade ) ";
	
	$stmt = $dbConn -> prepare($sql); 
	$stmt -> execute(); 
	$results = $stmt->fetchAll();
	
	return $results;
}

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Final</title>
		<meta name="description" content="">
		<meta name="author" content="Ashley Wallace">
		<link rel="stylesheet" href="css/hpStyleSheet.css">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>

	<body>
		<div class="mainDiv">	
        <h1>Final Exam - Question 25</h1>
		 
			<h3>Report One</h3>
			<p align="center">
			<?php
			foreach(getReportOne() as $student){
				echo $student['firstName'] . " " . $student['lastName'] . "<br />";
			}
			?>
			</p>
			
			<h3>Report Two</h3>
			<p align="center">
			<?php
			foreach(getReportTwo() as $student){
				echo $student['firstName'] . " " . $student['lastName'] . " " . $student['grade'] . "<br />";
			}
			?>
			
			</p>
						
			<h3>Report Three</h3>
			<p align="center">
			<?php
			foreach(getReportThree() as $assignment){
				echo $assignment['title'] . " " . $assignment['dueDate'] . "<br />";
			}
			?>
			</p>
									
			<h3>Report Four</h3>
			<p align="center">
			<?php
			foreach(getReportFour() as $student){
				echo $student['firstName'] . " " . $student['lastName'] . " " . $student['title'] . " " . $student['grade'] . "<br />";
			}
			?>
			</p>
			
												
			<h3>Report Five</h3>
			<p align="center">
			<?php
			foreach(getReportFive() as $student){
				echo $student['firstName'] . " " . $student['lastName'] . " " . $student['average'] . "<br />";
			}
			?>
			</p>
			
			
		</div>
	</body>
</html>
