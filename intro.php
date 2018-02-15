<?php 
//First lab class excerises Jan 16,2018
	
	//Variables
	$_name = "Orandi";
	$age = 85;
	$foodArray = array("macaroni","cereal","patty","chicken","rice");
	
	// echo "------------------------------<br/>";
	// echo "<strong>Good day, My name is ".$_name. " and I am " .$age. " and this is my first class in web systems!</strong>";
	//Testing age(first activity)
	// if($age == 18)
	// {
		// echo "".$_name. " you are ".$age." years of age.";
		// echo "You are ok to drive!";
	// } else if($age > 70)
	// {
		// echo "".$_name. " you are ".$age." years of age.";
		// echo "You are too old to drive!";
	
	// }else if($age == 70)
	// {
		// echo "".$_name. " you are ".$age." years of age.";
		// echo "You are too old to drive!";
	// }else if($age < 18)
	// {
		// echo "".$_name. " are ".$age." years of age.";
		// echo "You are not allowed to drive!";
	// }
	
	//Printing the contents of an array
	// for ($i = 0; $i < 5; $i++)
	// {
		// echo " <br/>". $foodArray[$i];
	// }
	
	//Printing the contents of an array using a forEach loop
	
	// foreach ($foodArray as $element)
	// {
		// echo " <br/>". $element;
	// }
	
	// print_r($foodArray);
?>
<html>
	<body>
		<ol>
		<?php
				$foodArray = array("macaroni","cereal","patty","chicken","rice");
				foreach ($foodArray as $element)
				{
					echo "<li>$element</li>";
				}
			?>
		</ol>
	</body>
</html>

