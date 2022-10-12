<?php

function validateContact() {
	$preambleErr = $nameErr = $emailErr = $communicationErr = $phonenumberErr = $inputErr = "";
	$preamble = $name = $email = $communication = $phonenumber = $input = "";
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

		$communication = test_input(getPostVar('communication'));
		if (empty($communication)) {
			$communicationErr = "Communicatievoorkeur is verplicht.";
		} else {
			
		}

		$phonenumber = test_input(getPostVar('phonenumber'));
		if (empty($phonenumber)) {
			$phonenumberErr = "Telefoonnummer is verplich.t";
		} else {
			if (!preg_match("/^0([0-9]{9})$/", $phonenumber)) {
				$phonenumberErr = "Vul geldig telefoonnummer in.";
			}
		}

		$preamble = test_input(getPostVar('preamble'));
		if (empty($preamble)) {
			$preambleErr = "Aanhef is verplicht.";
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

?>