<?php
//Sessions
//Start session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Support Team - Customer Queries</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<!--Custom stylesheet-->
	<link rel="stylesheet" type="text/css" href="Bootstrap
	/css/style.css"/>
</head>
<body class="support">
	<center><h1>Customer query-Support Page</h1></center>
	<table class="table table-hover">
		<thead>
		<tr>
			<th>User Name</th>
			<th>User Full Name</th>
			<th>User Password</th>
			<th>User email</th>
			<th>User Age</th>
			<th>User address</th>
			<th>User complaint</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				//If session is not set
				if(!isset($_SESSION['user_info'])){
					echo "<h1>No session data received!</h1>";
				}
				else{
					//Print session information
					foreach ($_SESSION['user_info'] as $key => $value) {
							echo "<td>$value</td>";
					}
				}
				?>
			</tr>
		</tbody>
	
	</table>
</body>
</html>

<?php
//Sessions
//End session
session_destroy();
?>