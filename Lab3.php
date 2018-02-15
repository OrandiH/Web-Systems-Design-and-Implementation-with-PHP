<!-- <?php
	//Validation
	// $email = "testemail@email.com";
	// $email2 = "test.email.com";

	// //How to validate emails using PHP constans
	// if(filter_var($email2,FILTER_VALIDATE_EMAIL))
	// {
	// 	echo $email." Email is valid";
	// }
	// else
	// {
	// 	echo "Email is invalid";
	// }
?> -->
<?php
//Process form data here




?>
<!DOCTYPE html>
<html>
<head>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>WSDI-Lab_3_OrandiHarris</title>
</head>
<body>
<div class="col-md-4">
	<!--User form-->
	<h1><u>Customer Queries</u></h1>
	<form action="$_SERVER['PHP_SELF']" method="POST">
		 <div class="form-group">
 		 	<h3>Username</h3>
 		 	<input type="text" class="form-control" name="userName" placeholder="Enter username" />
 		 </div>
 		  <div class="form-group">
 		 	<h3>Password</h3><input type="password" class="form-control" name="userPassword" placeholder="Enter email" />
 		 </div>
 		 	<div class="form-group">
 			<h3>Full name</h3>
 			<input type="text" name="userFullName" class="form-control" placeholder="Enter full name"/>
 		</div>
		<div class="form-group">
    		<h3>Email address</h3>
    		<input type="email" class="form-control" name="userEmail" placeholder="Enter email"/>
 		</div>
 	
 		<div class="form-group">
 			<h3>Age</h3>
 			<input type="text" name="userAge" class="form-control" placeholder="Enter age"/>
 		</div>
 		<div class="form-group">
 			<h3>Address</h3>
 			<input type="text" name="userAddress" class="form-control" placeholder="Enter address"/>
 		</div>
 		<div class="form-group">
 			<h3>Customer complaint</h3>
 			<textarea class="form-control" name="userComplaint" rows="4"></textarea>
 		</div>
 		<button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>

	</form>
</div>

</body>
</html>
