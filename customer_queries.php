<?php
//Customer query form
//Programmer:Orandi Harris

//Process form data here
session_start();


//Define empty variables for errors
$nameErr = "";
$passwdErr = "";
$wholeNameErr = "";
$emailErr = "";
$ageErr = "";
$addressErr = "";
$complaintErr = "";
$Val;

function check_input($value)
{
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
}

//Use this function to save session information on user
function process_customer_query($value1,$value2,$value3,$value4,$value5,$value6,$value7)
{
	$response= 0;
	if($value1=="" && $value2 =="" && $value3 == "" && $value4 == "" && $value5 == "" && $value6 == "" && $value7 == "")
	{
		return $response;
	}
	else{
		$response = 1;

		$_SESSION['user_info'] = array(
		'username' => $value1, 
		'userFullName' => $value2,
		'userPassword' => $value3,
		'userEmail' => $value4,
		'userAge' => $value5,
		'userAddress' => $value6,
		'userComplaint' => $value7
		);
		return $response;
	}
	

}
//Verify length of password user submits
function verifyPasswordLength($value)
{
	if(strlen($value) < 8)
	{
		$passwdErr = "Password is too short,password must be 8 characters";
	}
	else if (strlen($value) > 8) 
	 {
		$passwdErr = "Password is too long,password must be 8 characters at least";
	}
	else{
		$passwdErr = "";
	}
	return $passwdErr;

}
//Check if a post request was made from the form
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['btnsubmit']))
	{
		//Assign values of form to local variable
			foreach ($_POST as $key => $value) {
					$$key = $value;
			}
	//first level of validation
	$cleanUserName = check_input($userName);
	$cleanPassword = check_input($userPassword);
	$cleanUserFullName = check_input($userFullName);
	$cleanUserEmail = check_input($userEmail);
	$cleanUserAge = check_input($userAge);
	$cleanUserAddress = check_input($userAddress);
	$cleanUserComplaint = check_input($userComplaint);

	//Second stage of validation
	$passwdErr=verifyPasswordLength($cleanPassword);
	//Validate username
	if(!preg_match("/^([A-Z]{1})([A-Za-z-])([0-9]{1})?/", $cleanUserName))
	{
		$nameErr = "Username is invalid";
	}

	//Validate full name
	if(!preg_match("/^([A-Z]{1})([A-Za-z-])?/", $cleanUserFullName))
	{
		$wholeNameErr = "Full name is invalid";
	}

	//Validate email
	if(!filter_var($cleanUserEmail,FILTER_VALIDATE_EMAIL))
	{
		$emailErr = "Email is invalid";
	}

	//Validate address
	if(!preg_match("/^[0-9a-zA-Z,. ]+/", $cleanUserAddress))
	{
		$addressErr = "Address is invalid";
	}

	//Validate age
	if(!filter_var($cleanUserAge,FILTER_VALIDATE_INT))
	{
		$ageErr = "Age is invalid";
	}

	//Pass in validated information
    $Val = process_customer_query($cleanUserName,$cleanUserFullName,$userPassword
	,$cleanUserEmail,$cleanUserAge,$cleanUserAddress,$cleanUserComplaint);
    //If the form was processed correctly,redirect to support page
    if($Val == 1){
	    	header("Refresh: 2; url=support_CusQueries.php");
			echo "<script>alert('Your response has been received!')</script>";
    	}
	}
	else{
		echo "<script>alert('ERROR')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<!--Images and other styles-->
	<link rel="stylesheet" type="text/css" href="Bootstrap
	/css/style.css"/>
	<!--Bootstrap-->
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css"/>
	<title>WSDI-Lab_3_OrandiHarris</title>
</head>
<body>
	<div class="container col-sm-4">
<div class="col-sm-12">
	<!--User form-->
	<center><h1><i><u>Customer Queries System</u></i></h1></center>
	<center><h3>Please enter the following details</h3></center>
		<form id ="cusQueries" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
		 <div class="form-group">
 		 	<h3>Username</h3>
 		 	<input type="text" class="form-control" name="userName" placeholder="Enter username" />
 		 	<span class="text-warning"> <?php echo $nameErr; ?></span>
 		 </div>
 		  <div class="form-group">
 		 	<h3>Password</h3><input type="password" class="form-control" name="userPassword" placeholder="Enter password"  />
 		 	<span class="text-warning"> <?php echo $passwdErr; ?></span>
 		 </div>
 		 	<div class="form-group">
 			<h3>Full name</h3>
 			<input type="text" name="userFullName" class="form-control" placeholder="Enter full name"  />
 			<span class="text-warning"> <?php echo $wholeNameErr; ?></span>
 		</div>
		<div class="form-group">
    		<h3>Email address</h3>
    		<input type="email" class="form-control" name="userEmail" placeholder="Enter email"  />
    		<span class="text-warning"> <?php echo $emailErr; ?></span>
 		</div>
 	
 		<div class="form-group">
 			<h3>Age</h3>
 			<input type="text" name="userAge" class="form-control" placeholder="Enter age" />
 			<span class="text-warning"> <?php echo $ageErr; ?></span>
 		</div>
 		<div class="form-group">
 			<h3>Address</h3>
 			<input type="text" name="userAddress" class="form-control" placeholder="Enter address" />
 			<span class="text-warning"> <?php echo $addressErr; ?></span>
 		</div>
 		<div class="form-group">
 			<h3>Customer complaint</h3>
 			<textarea class="form-control" name="userComplaint" rows="4" placeholder="Enter complaint"></textarea>
 			<span><i>@Optional</i></span>
 		</div>
 		<center><button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button></center>
		</form>
</div>
	</div>
</body>
</html>