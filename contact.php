<?php

	define("PREAMBLE", array("mr" => "Meneer", "mrs" => "Mevrouw"));
	define("COMMUNICATION", array("email" => "Email", "phone" => "Telefoon"));

function showContactHead(){
    echo "Contact";
}

function showContactHeader() {
    echo "Contact";
}

function showContactContent() {
     $data = validateContact();

     if ($data['valid']) {

         showContactThanks($data);

     } else {

         showContactForm($data);

    }
}
 /* waarom?? return array ("name" => $name, 

								"nameErr" => $nameErr,

								"validForm" => $validForm  ); 
		 
		 } 
	 En waarom?? 	  if ($_REQUEST['REQUEST_METHOD'] == 'POST' ) {
		>>>>>>>>	 $name = testInput(getPostVar('name'));
					if (empty($name)) { 
		             $nameErr = "Vul uw naam in";
*/ 		 
function validateContact() {
	$preambleErr = $nameErr = $emailErr = $communicationErr = $phonenumberErr = $inputErr = "";
	$preamble = $name = $email = $communication = $phonenumber = $input = "";
	$valid = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input(getPostVar('name'));
		if (empty($name)) {
			$nameErr = "Name is required";
		} else {
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		$email = test_input(getPostVar('email'));
		if (empty($email)) {
			$emailErr = "Email is required";
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		$communication = test_input(getPostVar('communication'));
		if (empty($communication)) {
			$communicationErr = "Communication is required";
		} else {

		}

		$phonenumber = test_input(getPostVar('phonenumber'));
		if (empty($phonenumber)) {
			$phonenumberErr = "Phonenumber is required";
		} else {
			
		}

		$preamble = test_input(getPostVar('preamble'));
		if (empty($preamble)) {
			$preambleErr = "Preamble is required";
		} else {
	
		}

		$input = test_input(getPostVar('input'));
		if (empty($input)) {
			$inputErr = "";
		} else {
		
		}

		if (empty($nameErr) && empty($emailErr) && empty($communicationErr) && empty($phonenumberErr) && empty($preambleErr) && empty($inputErr)) {
			$valid = true;
		}


	}
	return array("name" => $name, "nameErr" => $nameErr,
	"valid" => $valid,
	"preamble" => $preamble, "preambleErr" => $preambleErr,
	"email" => $email, "emailErr" => $emailErr,
	"communication" => $communication, "communicationErr" => $communicationErr,
	"phonenumber" => $phonenumber, "phonenumberErr" => $phonenumberErr, 
	"input" => $input, "inputErr" => $inputErr);
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	

function showContactForm($data) {
	echo '<form action="index.php" method="post">
	<div class="preamble">
		<label for="preamble">Aanhef: </label>
		<select id="preamble" name="preamble">
			<option value="mr"';  if (isset($data['preamble']) && $data['preamble'] == "mr") echo "selected"; echo'>Meneer</option>
			<option value="mrs"';  if (isset($data['preamble']) && $data['preamble'] == "mrs") echo "selected"; echo'>Mevrouw</option>
		</select> <br>
	</div>

	<div class="info">
		<br>
		<label for="name">Naam:</label>
		<input type="text" id="name" name="name" value="' . $data['name']. '" placeholder="John">
		<span class="error"> ' . $data['nameErr'] . ' </span><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="' . $data['email'] . '" placeholder="Doe@gmail.com">
		<span class="error"> ' . $data['emailErr'] . ' </span><br><br>
		<label for="phonenumber">Telefoonnummer:</label>
		<input type="tel" id="phonenumber" name="phonenumber" value="' . $data['phonenumber'] . '" placeholder="0612345678">
		<span class="error">' . $data['phonenumberErr'] . '</span><br><br>
	</div>

	<div class="communication">
		<br>
		<label for="communication">Voorkeur communicatie:</label>
		<span class="error"> ' . $data['communicationErr'] . '</span><br>
		<input type="radio" id="email2" name="communication"';  if (isset($data['communication']) && $data['communication'] == "email") echo "checked"; echo'value="email" >
		<label for="email2">Email</label><br>
		<input type="radio" id="phone" name="communication"'; if (isset($data['communication']) && $data['communication'] == "phone") echo "checked"; echo' value="phone">
		<label for="phone">Telefoon</label><br>
		<br>
	</div>


	<div class="input">
		<label for="input">Text veld: </label>
		<textarea name="input" rows="8" cols="30" placeholder="Vul hier overige informatie die van belang is in.">' . $data['input'] . '</textarea> <br>
		<br>
	</div>


	<div>
		<input type="submit" value="Submit">
	</div>

	<input type="hidden" name="page" value="contact">

</form>';
}

function ShowContactThanks($data){
	echo '<p class="thanks"> Bedankt voor het invullen van het contactformulier. </p>
	<br>
	<h3> Jouw gegevens:</h3>';
	echo 'Aanhef: ' . PREAMBLE[$data['preamble']] . PHP_EOL;
	echo "<br>";
	echo 'Naam: ' . $data['name']  . PHP_EOL;
	echo "<br>";
	echo 'Email: ' .  $data['email'] . PHP_EOL;
	echo "<br>";
	echo 'Voorkeur communicatie: ' . COMMUNICATION[$data['communication']] . PHP_EOL;
	echo "<br>";
	echo 'Telefoonnummer: ' . $data['phonenumber'] . PHP_EOL;
	echo "<br>";
	echo 'Text: ' . $data['input'] . PHP_EOL;
}

?>