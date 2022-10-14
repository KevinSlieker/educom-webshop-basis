<?php

	define("PREAMBLE", array("mr" => "Meneer", "mrs" => "Mevrouw"));
	define("COMMUNICATION", array("email" => "Email", "phone" => "Telefoon"));

function showContactHead(){
    echo "Contact";
}

function showContactHeader() {
    echo "Contact";
}

/*
IPV wat er bij de preamble staat.
showFormStart();
showFormSectionStart("preamble");
showFormItem("preamble", "select", "Aanhef:", $data, NULL, array('mr'  => "Meneer", 'mrs' => "Mevrouw"));
showFormSectionEnd();
*/


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
		<input type="radio" id="email2" name="communication"';  if (isset($data['communication']) && $data['communication'] == "email") echo "checked"; echo' value="email" >
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

showFormStart();
showFormSectionStart("preamble");
showFormItem("preamble", "select", "Aanhef:", $data, NULL, array('mr'  => "Meneer", 'mrs' => "Mevrouw"));
showFormSectionEnd();
showFormSectionStart("info");
showFormItem("name", "text", "Naam:", $data, "John");
showFormItem("email", "email", "Email:", $data, "Doe@gmail.com");
showFormItem("phonenumber", "tel", "Telefoonnummer:", $data, "0612345678");
showFormSectionEnd();
showFormItem("communication", "radio", "Voorkeur communicatie:", $data, NULL, array('email'  => "Email", 'phone' => "Telefoon"));
showFormSectionEnd();
showFormSectionStart("input");
showFormItem("input", "textarea", "Text veld:", $data, "Vul hier overige informatie die van belang is in.", NULL, "8", "30");
showFormSectionEnd();
showFormEnd("contact", "Submit");

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