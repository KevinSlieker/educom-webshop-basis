<?php

function showRegisterHead(){
    echo "Register";
}

function showRegisterHeader() {
    echo "Register";
}

function showRegisterContent() {
     $data = validateRegister();

     if ($data['valid']) {
        
         storeUser($email,$name,$password);

     } else {

         showRegisterForm($data);

    }
}

function validateRegister() {
    $nameErr = $emailErr = $passwordErr = $passwordrepeatErr = "";
	$name = $email = $password = $passwordrepeat = "";
	$valid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input(getPostVar('name'));
		if (empty($name)) {
			$nameErr = "Naam is verplicht.";
		} else {
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Alleen letters en spaties zijn toegestaan.";
			}
		}

        $email = test_input(getPostVar('email'));
		if (empty($email)) {
			$emailErr = "Email is verplicht.";
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Ongeldig email.";
			}
		}

        $password = test_input(getPostVar('password'));
		if (empty($password)) {
			$passwordErr = "Wachtwoord is verplicht.";
		} else {

		}

        $passwordrepeat = test_input(getPostVar('passwordrepeat'));
		if (empty($passwordrepeat)) {
			$passwordrepeatErr = "Herhaal wachtwoord is verplicht.";
		} else {
         if ($password !== $passwordrepeat) {
			$passwordrepeatErr = "Herhaal wachtwoord komt niet over een met wachtwoord.";
		 }
		}
		
		if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($passwordrepeatErr)) {
			if (empty(doesEmailExist($email))) {
				$valid = true;
			} else {
				$emailErr = "Email is al in gebruik.";
			}
		}


    }
    

    return array("name" => $name, "nameErr" => $nameErr,
	"valid" => $valid,
	"password" => $password, "passwordErr" => $passwordErr,
	"email" => $email, "emailErr" => $emailErr,
	"passwordrepeat" => $passwordrepeat, "passwordrepeatErr" => $passwordrepeatErr);

}



function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	

function showRegisterForm($data) {
	echo '<form action="index.php" method="post">
    <div class="info">
		<br>
		<label for="name">Naam:</label>
		<input type="text" id="name" name="name" value="' . $data['name']. '" placeholder="John">
		<span class="error"> ' . $data['nameErr'] . ' </span><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="' . $data['email'] . '" placeholder="Doe@gmail.com">
		<span class="error"> ' . $data['emailErr'] . ' </span><br><br>
		<label for="password">Wachtwoord:</label>
		<input type="password" id="password" name="password" value="' . $data['password'] . '" placeholder="Wachtwoord123">
		<span class="error">' . $data['passwordErr'] . '</span><br><br>
        <label for="passwordrepeat">Herhaal wachtwoord: </label>
        <input type="password" id="passwordrepeat" name="passwordrepeat" value="' . $data['passwordrepeat'] . '" placeholder="Wachtwoord123">
		<span class="error">' . $data['passwordrepeatErr'] . '</span><br><br>
	</div>

	<div>
		<input type="submit" value="Register">
	</div>

	<input type="hidden" name="page" value="register">

</form>';
}
?>