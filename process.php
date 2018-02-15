<?php
#PHP SCRIPT TO PROCESS FORM DATA
#Programmer:Orandi Harris
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$typeOfTrip = $_GET['typeOfTrip'];
		$fromCity = $_GET['fromCity'];
		$toCity = $_GET['toCity'];
		$departureDate = $_GET['departureDate'];
		$returnDate = $_GET['returnDate'];
		$numOfPassengers = $_GET['numOfPassengers'];

	    $departureDate1 = new DateTime($departureDate);
	    $returnDate1 = new DateTime($returnDate);
		
		$lengthOfStay = date_diff($departureDate1,$returnDate1);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Processing booking</title>
		<!--Bootstrap-->
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<!--Images and other styles-->
	<link rel="stylesheet" type="text/css" href="Bootstrap
	/css/style.css"/>
</head>
<body class="booking">
	<div class="container col-sm-4">
		<div class=" col-sm-12">
			<strong>
			<br/><br/>
			<h2>Your flight query:</h2>
			<p>Type of trip: <?php echo $typeOfTrip; ?></p>
			<p>City travelling from: <?php echo $fromCity; ?></p>
			<p>City travelling to: <?php echo $toCity; ?></p>
			<p>Departure Date: <?php echo$departureDate; ?></p>
			<p>Return Date: <?php echo $returnDate; ?></p>
			<p>Number of passengers: <?php echo $numOfPassengers; ?></p>

			<h4><?php echo $lengthOfStay -> format("<strong>Your intended stay is for %a days.</strong>"); ?></h4>
		</strong>
		<br/>
			<button class="btn btn-info"><a href = 'Booking.php'><p>Back to main page</p></a></button>
		</div>
	</div>
</body>
</html>