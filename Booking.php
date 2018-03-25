<!DOCTYPE HTML>
<!--Lab 2 for Web Systems-Form processing -->
<!-- Programmer: Orandi Harris -->
<html>
<head>
	<title>Booking Page</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<!--Images and other styles-->
	<link rel="stylesheet" type="text/css" href="Bootstrap
	/css/style.css"/>
</head>
<body class="booking">
	<div class="container col-sm-4">
		<div>
			<h2>Book Your Flights Here</h2>
			<a href="register.php">Registration</a>
			<a href="login.php">Login</a>
		</div>
		<div class="col-sm-12">
			<form action='process.php' method ="GET" class="border border-light">
				<div class="form-group">
					<select name="typeOfTrip"> 
					<option value = "Round Trip" name="Round Trip" class="form-control">Round Trip</option>
					<option value = "One Way" name="One Way" class="form-control"> One Way </option>
				</select> <br/> <br/>
				</div>
				<div class="form-group">
				<h3>City Travelling From:</h3> <input type="text" name = "fromCity" class="form-control" /> 
					
				<h3>City Travelling To:</h3> <input type = "text" name = "toCity" class="form-control" />
				
				</div>
				<div class="form-group">
					<h3>Departure Date</h3>
					<input type="date" name = "departureDate" class="form-control" />
				</div>
				 
				<div class="form-group">
					<h3>Return Date</h3>
					 <input type="date" name = "returnDate" class="form-control" />
				</div>

				<div class="form-group">
					<h3># of passengers</h3>
					<input type="text" name = "numOfPassengers" class="form-control" />
				</div>
				
				
				<input type="submit" class="btn btn-primary" name="findFlightsButton" value="Find Flights"/>
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>