<?php

require_once('session_manager.php');


function showLoginHead(){
    echo "Login";
}

function showLoginHeader() {
    echo "Login";
}

function showLoginContent() {
     $data = validateLogin();

     if ($data['valid']) {
        
        // waar het naar toe moet (home);

     } else {

         showLoginForm($data);

    }
}

function validateLogin() {
    $emailErr = $passwordErr = "";
	$email = $password = "";
	$valid = false;

	require_once("user_service.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        if (empty($emailErr) && empty($passwordErr)) {
			if (!empty(authenicateUser($email, $password))) {
				$valid = true;
			} else {
                if (doesEmailExist($email) == FALSE) {
				$emailErr = "Email is onbekend.";
                } else {
                $passwordErr = "Verkeerd wachtwoord.";    
                }
                }
			}
		}

    
    return array(
	"valid" => $valid,
	"password" => $password, "passwordErr" => $passwordErr,
	"email" => $email, "emailErr" => $emailErr);

}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	

function showLoginForm($data) {
	echo '<form action="index.php?page=home" method="post">
    <div class="info">
		<br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="' . $data['email'] . '" placeholder="Doe@gmail.com">
		<span class="error"> ' . $data['emailErr'] . ' </span><br><br>
		<label for="password">Wachtwoord:</label>
		<input type="password" id="password" name="password" value="' . $data['password'] . '" placeholder="Wachtwoord123">
		<span class="error">' . $data['passwordErr'] . '</span><br><br>

	</div>

	<div>
		<input type="submit" value="Login">
	</div>

	<input type="hidden" name="page" value="login">

</form>';
}


?>