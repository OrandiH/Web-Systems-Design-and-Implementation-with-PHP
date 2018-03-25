<?php
//Programmer:Orandi Harris
//Process and validate form data in this script
session_start();//Start session
//Define error Flag
$errFlag = 0;
$cost = "";

//Sanitize input
function check_input($value)
{
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
}

//Function to do cost estimate of stay
function Costing($numOfPersons,$Stay)
{
	$Cost = 250 * $numOfPersons * $Stay;

	return $Cost;
}

//Pass values to be saved to session array
function processData($value1,$value2,$value3,$value4,$value5,$value6,$value7)
{
	$JMDCost = $value7 * 129;

	$_SESSION['customers'] = array(
		'FirstName' => $value1,
		'LastName' => $value2,
		'Email' => $value3,
		'RoomView' => $value4,
		'numOfPersons' => $value5,
		'lengthOfStay' => $value6,
		'Cost' => $value7,
		'JMDCost' => $JMDCost
	);

}

//Check if a GET request is made to the server
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	//Check if the submit button has been set
	if(isset($_GET["btnsubmit"]))
	{
		//Assign $_GET values to local variable with a foreach
		foreach ($_GET as $key => $value) {
			$$key = $value;
		}

		$rView = $roomView;
		//First check all input of slashes,whitespaces and html characters
		$cleanFirstName = check_input($fName);
		$cleanLastName = check_input($lName);
		$cleanEmail = check_input($email);
		$cleanNumOfPersons = check_input($numOfPersons);
		$cleanLengthOfStay = check_input($lengthOfStay);


		//Validation of user input of firstname 
		if(!filter_var($cleanFirstName,FILTER_SANITIZE_STRING)){
			$errFlag = 1;
		}
		//Validation of user input of lastname 
		if(!filter_var($cleanLastName,FILTER_SANITIZE_STRING))
		{
			$errFlag = 1;
		}
		//Validation of user input of email
		if(!filter_var($cleanEmail,FILTER_VALIDATE_EMAIL))
		{
			$errFlag = 1;
		}
		//Validation of user input of number of persons staying
		if(!filter_var($cleanNumOfPersons,FILTER_VALIDATE_INT))
		{
			$errFlag = 1;
		}
		//Validation of user input of length of stay
		if(!filter_var($cleanLengthOfStay,FILTER_VALIDATE_INT))
		{
			$errFlag = 1;
		}
		//Generate cost and store to local value
		$cost = Costing($cleanNumOfPersons,$cleanLengthOfStay);
		//If an error occurs redirect to index page if not redirect to the Confirmation page
		if($errFlag == 0)
		{
			processData($cleanFirstName,$cleanLastName,$cleanEmail,$rView,$cleanNumOfPersons,$cleanLengthOfStay,$cost);
			header('Location:Confirmation.php');
		}
		else{
			header('Location:Index.php');
		}
		
	}
}



?>