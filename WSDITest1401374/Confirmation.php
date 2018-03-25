<?php
	session_start(); //Start session
?>
<!--Display confirmation information on this page-->
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="confirmation">
	<center>
		<h1>Your booking has been confirmed! See booking information below</h1><br/><br/><br/><br/></br/>
	<table class="table">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email Address</th>
				<th>Room view</th>
				<th>Number of persons</th>
				<th>Length of stay</th>
				<th>Cost($USD)</th>
				<th>Cost($JMD)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				//Check if session is set
					if(!isset($_SESSION['customers']))
					{
						echo "<h1>No session data</h1>";
					}
					else{
						//Echo out session values
						foreach ($_SESSION['customers'] as $key => $value) {
							echo "<td>$value</td>";
						}
					}
				?>
			</tr>
		</tbody>
	</table>
</center>
</body>
</html>

<?php
//Destroy session
session_destroy();
?>