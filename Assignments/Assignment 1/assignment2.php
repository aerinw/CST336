<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Ashley Wallace CST336 Homepage</title>
  <meta name="description" content="">
  <meta name="author" content="Ashley Wallace">

  <link rel="stylesheet" href="css/hpStyleSheet.css">
<style>
</style>
</head>

<body>
<div class="mainDiv">
<br />
<br />
<?php
  $index = 0;
  $heart = array(22,23,27,28,31,34,36,39,41,45,49,51,59,62,68,73,77,84,86,95);
  echo "<p align='center'><h1>Assignment 2</h1></p>";
  echo "<table align='center'>";
  for ($i=0; $i<10; $i++) {
   echo "<tr>";  	
    for ($j=0; $j<10; $j++) {
       $index++;
	   $match = 0;
	   foreach($heart as $hNum){
	   	if($index == $hNum){
	   	  $match++; 
		}
	   }
	   if($match > 0){
	   	echo "<td class='heartTable'>&nbsp; <br /></td>";
	   } else {
	   	echo "<td>&nbsp; <br /></td>";
	   }	   
	}
    echo "</tr>";
  }
  echo "</table><br /><br />";
  
  echo "<table align='center'>";
  $xOne = 1;
  $xTwo = 10;
  $index = 0;
  for ($i=0; $i<10; $i++) {
   echo "<tr>";  	
    for ($j=0; $j<10; $j++) {
       $index++;
		if($index == $xOne || $index == $xTwo){
		   echo "<td class='heartTable'>&nbsp; <br /></td>";	
		} else {
		   echo "<td>&nbsp; <br /></td>";	
		}
		
	}
    echo "</tr>";
    $xOne += 11;
	$xTwo += 9;
  }
  echo "</table>";

?>	
</div>
</body>
</html>	