<?php
  $error1 = "";
  $error2 = "";
  $inches = "";
  $cms = "";
  $result = "";
  
  if ( isset($_GET['cm'] ) )
  {
  	$cms = $_GET['cm'];
  	
  	if(is_numeric($cms))
  	{
  	  $inches = $cms * 0.393701;	
  	} else {
  		$error1 = "<span>You must enter a number!</span>";
  	       }
  }

  if( isset($_GET['in'] ) )
  {
  	$in = $_GET['in'];
  	if(is_numeric($in))
  	{
  	  $unit = $_GET['unit'];
  	  
  	  switch ($unit)
  	  {
  	  	case 'cms':   $result = "<span>" . $in * 2.54 . "</span>";
  	  	               break;
  	    case 'yards': $result = "<span>" . $in / 36 . "</span>";
  	                   break;
  	    case 'feet':  $result = "<span>" . $in / 12  . "</span>";
  	                   break;
  	    case '':      $result = "Please choose a unit to convert";
  	    
  	    default:       break;
  	  }	
  	} else {
  		$error2 = "<span>You must enter a number!</span>";
  	       }
  }
 
  ?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab 3</title>
		<meta name="description" content="">
		<meta name="author" content="Ashley Wallace">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="css/hpStyleSheet.css">
	</head>

	<body>
		<div class="mainDiv">
        <br /> <br />
		<h1>Length Converter</h1>
		<div align = "center">
			<form method="get">
				<span>Enter Centimeters:</span> <input type="text" name='cm'> 
				<input type="submit" value="Convert to Inches">
			</form>
            <br />
			<?php
			if ($inches<>""){
			    echo "<span>$inches Inches</span>";
			} else {
			    echo  "<span>$error1</span>";
			}
			?>
        
			<form method="get">
				<span>Enter Inches:</span><input type="text" name='in'> <br />
				<span>Convert to:</span>
				<input type="radio"; name='unit' value='cms'><span>cms</span>
				<input type="radio"; name='unit' value='yards'><span>yards</span>
				<input type="radio"; name='unit' value='feet'><span>feet</span>
				<br />
				<input type="submit" value="Convert">
			</form>
			<?= $result ?>
			<?= $error2 ?>
			</div>
		</div>
	</body>
</html>
