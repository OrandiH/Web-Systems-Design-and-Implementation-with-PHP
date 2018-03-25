<?php
	session_start();
	//Include sql code to update and delete data from database if update button or delete button is set
	$userID = $_SESSION['users'][0]->userID; //Get user ID From session
	//Check server request method and then if update button is set
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['update']))
		{
			//Check if address and cell nunber fields were both set
			if(isset($_POST['address']) && isset($_POST['cellNumber']))
			{
				$address = $_POST['address'];
				$cellNumber = $_POST['cellNumber'];

				//Database info
					$serverName = "localhost";
					$dbUserName = "root";
					$dbPassword = "";
					$dbName = "Airlines_db";

			try 
			{
			$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbPassword);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    $sql = "UPDATE users SET address='$address', cellNumber='$cellNumber' WHERE userID='$userID'";

			    // Prepare statement
			    $stmt = $conn->prepare($sql);

			    // execute the query
			    $stmt->execute();

			    // echo a message to say the UPDATE succeeded
			    echo $stmt->rowCount() . " records UPDATED successfully";
   			 }
		 	catch(PDOException $e)
 	   			{
  				  echo $sql . "<br>" . $e->getMessage();
   	   			}
				$conn = null;

			}

			//Check if the address field was set
			else if(isset($_POST['address']))
			{
				$address = $_POST['address'];

					//Database info
					$serverName = "localhost";
					$dbUserName = "root";
					$dbPassword = "";
					$dbName = "Airlines_db";

			try 
			{
			$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbPassword);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    $sql = "UPDATE users SET address='$address' WHERE userID='$userID'";

			    // Prepare statement
			    $stmt = $conn->prepare($sql);

			    // execute the query
			    $stmt->execute();

			    // echo a message to say the UPDATE succeeded
			    echo $stmt->rowCount() . " records UPDATED successfully";
   			 }
		 	catch(PDOException $e)
 	   			{
  				  echo $sql . "<br>" . $e->getMessage();
   	   			}
				$conn = null;

			} 
			else if(isset($_POST['cellNumber'])) //Check if the cellnumber field has been set
			{
				$cellNumber = $_POST['cellNumber'];

				//Database info
					$serverName = "localhost";
					$dbUserName = "root";
					$dbPassword = "";
					$dbName = "Airlines_db";

			try 
			{
			$conn = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbPassword);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// sql to delete a record
			    $sql = "UPDATE users SET address='$address' WHERE userID='$userID'";

				 $stmt = $conn->prepare($sql);

			    // execute the query
			    $stmt->execute();

			    // echo a message to say the UPDATE succeeded
			    echo $stmt->rowCount() . " records UPDATED successfully";
   			 }
		 	catch(PDOException $e)
 	   			{
  				  echo $sql . "<br>" . $e->getMessage();
   	   			}
				$conn = null;

			}

		}
		else if (isset($_POST['delete'])) //Check if delete button has been set
		{
			//Database info
			$serverName = "localhost";
			$dbUserName = "root";
			$dbPassword = "";
			$dbName = "Airlines_db";

			try {
			    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbPassword);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    // sql to delete a record
			    $sql = "DELETE FROM users WHERE userID='$userID'";

			    // use exec() because no results are returned
			    $conn->exec($sql);
			    echo "Record deleted successfully";
			    }
			catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }
			$conn = null;
		}
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
</head>
<body>
	<form action="myProfile.php" method="POST">
		<fieldset>
			<legend>User Profile</legend>
			<h3>See below your user information</h3>
		<p>First Name: <input type="text" name="fName" placeholder="<?php echo $_SESSION['users'][0]->firstName;?>" /></p><br/>
		<p>Last Name: <input type="text" name="lName" placeholder="<?php echo $_SESSION['users'][0]->lastName;?>"/></p><br/>
		<p>Address : <input type="text" name="address" placeholder="<?php echo $_SESSION['users'][0]->address;?>"/></p><br/>
		<p>Cell Number: <input type="text" name="cellNumber" placeholder="<?php echo $_SESSION['users'][0]->cellNumber;?>" /></p><br/>
		<button type="submit" name="update">Update</button> 
		<button type= "submit" name="delete">Delete</button>
	</form>
	</fieldset>
</body>
</html>