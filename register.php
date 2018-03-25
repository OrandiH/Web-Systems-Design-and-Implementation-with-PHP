<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form action="register.php" method="POST">
		<fieldset>
			<legend>Registration</legend>
		User ID : <input type="text" name="userID"><br/>
		First Name: <input type="text" name="fName"/><br/>
		Last Name: <input type="text" name="lName"/><br/>
		Address : <input type="text" name="address"><br/>
		Cell Number: <input type="text" name="cellNumber"><br/>
		Password : <input type="password" name="passwd"><br/>
		<input type="submit" name="Submit">
	</form>
	</fieldset>
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$userID = $_POST['userID'];
	$password = $_POST['passwd'];
	$FirstName = $_POST['fName'];
	$LastName = $_POST['lName'];
	$address = $_POST['address'];
	$cellNumber = $_POST['cellNumber'];


	//Database info
	$serverName = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbName = "Airlines_db";

	//Connect to DB and enter data

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName",$dbUserName,$dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO users (userID,password,firstName,lastName,address,cellNumber) VALUES 
		('$userID','$password','$FirstName','$LastName','$address','$cellNumber')";

		$conn->exec($sql);

		echo "Record added";
 }catch(PDOException $e){
 	echo $sql. "<br>" . $e->getMessage();
 }
 $conn = null;//Close connection to db
}

?>