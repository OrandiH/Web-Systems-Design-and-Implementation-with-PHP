<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="login.php" method="POST">
		<fieldset>
			<legend>Login</legend>
		<p>User ID : <input type="text" name="userID"></p><br/>
		<p>Password : <input type="Password" name="passwd"></p><br/>
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

	//Database info
	$serverName = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbName = "Airlines_db";

	//Connect to DB and enter data

	try{
		$pdo = new PDO("mysql:host=$serverName;dbname=$dbName",$dbUserName,$dbPassword);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Set the default PDO fetch mode to Object
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		//Set SQL statement using named parameters

		$sql = "SELECT * FROM users WHERE userID = :userID && password = :password";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['userID' => $userID,'password'=> $password]);

		$users = $stmt->fetchAll();
		$userCount = $stmt->rowCount();

		if($userCount == 1)
		{
			$_SESSION['users'] = (array) $users;
			echo "You have successfully logged in!";
			header("Refresh: 4; url=loggedIn.php");
		}
		else{
			header("Refresh:5; url=login.php");
			echo "<h2>Invalid userID or password</h2>";
		}

 }catch(PDOException $e){
 	echo $sql. "<br>" . $e->getMessage();
 }
 $stmt = null;//Close connection to db
 $pdo = null;
}

?>