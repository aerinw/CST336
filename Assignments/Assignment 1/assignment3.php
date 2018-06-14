<?php
   $wordArr = array();
   if(isset($_GET['w1'])){
      $wordArr[] = $_GET['w1'];
   }
   if(isset($_GET['w2'])){
      $wordArr[] = $_GET['w2'];
   }
   if(isset($_GET['w3'])){
      $wordArr[] = $_GET['w3'];
   }
   if(isset($_GET['w4'])){
      $wordArr[] = $_GET['w4'];
   }
   if(isset($_GET['w5'])){
      $wordArr[] = $_GET['w5'];
   }
   if(isset($_GET['w6'])){
      $wordArr[] = $_GET['w6'];
   }
   if(isset($_GET['w7'])){
      $wordArr[] = $_GET['w7'];
   }   
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Assignment 3</title>
		<meta name="description" content="">
		<meta name="author" content="Ashley Wallace">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="css/hpStyleSheet.css">
	</head>

	<body>
		<div class="mainDiv">
      	 	<br /> <br />
			<h1>Assignment 3</h1>
			<div align="center">
				<form method="get">
					<span>Word 1</span> <input type="text" name='w1'><br /> 
					<span>Word 2</span> <input type="text" name='w2'><br /> 
					<span>Word 3</span> <input type="text" name='w3'><br /> 
					<span>Word 4</span> <input type="text" name='w4'><br /> 
					<span>Word 5</span> <input type="text" name='w5'><br /> 
					<span>Word 6</span> <input type="text" name='w6'><br /> 
					<span>Word 7</span> <input type="text" name='w7'><br /> 
					<input type="submit" value="submit">
				</form>
        		<?php
        		
        		//1 use count the elements
        	   if(count($wordArr) > 0){
        	   	 //Print the original array
        	  	 echo "<p><b>Here are the words you submitted:</b><br />";
      		 	  foreach ($wordArr as $item)
     	     	  {
     	  		  		echo $item;
     	    			echo "<br />";
     			   }
     			   echo "</p>";
     			   

     			  //2 sort the array aphabetically
     			  sort($wordArr,2);
     			  echo "<p><b>Here are the words sorted alphabetically:</b><br />";
      		 	  foreach ($wordArr as $item)
     	     	  {
     	  		  		echo $item;
     	    			echo "<br />";
     			   }
     			   echo "</p>";

				  //3 sort the array in decending aphabetical order
     			  arsort($wordArr,2);
     			  echo "<p><b>Here are the words sorted in decending alphabetical order :</b><br />";
      		 	  foreach ($wordArr as $item)
     	     	  {
     	  		  		echo $item;
     	    			echo "<br />";
     			   }
     			   echo "</p>";              
              
     			  //4 shuffle the array
     			  shuffle($wordArr);
     			  echo "<p><b>Here are the words randomized:</b><br />";
      		 	  foreach ($wordArr as $item)
     	     	  {
     	  		  		echo $item;
     	    			echo "<br />";
     			   }
     			   echo "</p>";              
     			        		   
    		      //5 case sensistive natural order
    		      natcasesort($wordArr);
     		      echo "<p><b>Here are the words in a case sensitive natural order:</b><br />";
      		 	  foreach ($wordArr as $item)
     	     	  {
     	  		  		echo $item;
     	    			echo "<br />";
     			   }
     			   echo "</p>";              
     		   }   		   
     		   ?>
			</div>
		</div>
	</body>
</html>
