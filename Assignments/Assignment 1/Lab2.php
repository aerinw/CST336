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
  $even = 0;
  $odd = 0; 
  $numSum = 0;	
  echo "<p align='center'><h1>Lab 2</h1></p>";
  echo "<table align='center'>";
  for ($i=0; $i<10; $i++) {
   echo "<tr>";  	
    for ($j=0; $j<10; $j++) {
     $randNum = rand(1,100);
     if (($randNum%2) == 0) {
      echo "<td class='randTableEven'>$randNum</td>";
	  $even++;
     }
     else {
      echo "<td class='randTableOdd'>$randNum</td>";
	  $odd++;
     }
	 $numSum += $randNum;
	 $numAve = $numSum / ($even + $odd);
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "<div align='center'>";
  echo "<p>There are $even even numbers and $odd odd numbers.</p>";
  echo "<p>The sum of the number is $numSum.</p>";
  echo "<p>The average of the numbers is $numAve.</p>";
?>	
</div>
</body>
</html>	