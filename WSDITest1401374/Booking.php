<!--Booking page-->
<!--Programmer:Orandi Harris 1401374-->
<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="booking">
		<form action="BookingValid.php" method="GET" class="form">
		<fieldset>
			<legend>Booking</legend>
			<p>First Name:<input type="text" name="fName"/></p><br/>
			<p>Last Name:<input type="text" name="lName"/></p><br/>
			<p>Email:<input type="email" name="email"/></p><br/>
			<p>Room view:
				<select name="roomView">
					<option>Ocean View</option>
					<option>Terrace View</option>
					<option>Pool View</option>
				</select> 
			</p>
			<br/>
			<p>Number of persons staying:<input type="text" name="numOfPersons"/></p><br/>
			<p>Length of stay(in days):<input type="text" name="lengthOfStay"></p><br/>
			<center><input type="submit" name="btnsubmit"></center>
		</fieldset>
	</form>
</body>
</html>