<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="CSS/stylesheet.css">

	<title> Contact </title>

</head>

<body>

	<?php

	$preambleErr = $nameErr = $emailErr = $communicationErr = $phonenumberErr = $inputErr = "";
	$preamble = $name = $email = $communication = $phonenumber = $input = "";
	$valid = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		if (empty($_POST["communication"])) {
			$communicationErr = "Communication is required";
		} else {
			$communication = test_input($_POST["communication"]);
		}

		if (empty($_POST["phonenumber"])) {
			$phonenumberErr = "Phonenumber is required";
		} else {
			$phonenumber = test_input($_POST["phonenumber"]);
		}

		if (empty($_POST["preamble"])) {
			$preambleErr = "Preamble is required";
		} else {
			$preamble = test_input($_POST["preamble"]);
		}

		if (empty($_POST["input"])) {
			$inputErr = "";
		} else {
			$input = test_input($_POST["input"]);
		}

		if (empty($nameErr) && empty($emailErr) && empty($communicationErr) && empty($phonenumberErr) && empty($preambleErr) && empty($inputErr)) {
			$valid = true;
		}
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<h1> Contact </h1>


	<div class="links">
		<ul>
			<li> <a Href="index.html"> Home </a> </li>
			<li> <a Href="about.html"> About </a> </li>
			<li> <a Href="contact.php"> Contact </a> </li>
		</ul>
	</div>


	<?php if (!$valid) { ?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="preamble">
				<label for="preamble">Preamble: </label>
				<select id="preamble" name="preamble">
					<option value="mr" <?php if (isset($preamble) && $preamble == "mr") echo "selected"; ?>>Mr</option>
					<option value="mrs" <?php if (isset($preamble) && $preamble == "mrs") echo "selected"; ?>>Mrs</option>
				</select> <br>
			</div>

			<div class="info">
				<br>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="John">
				<span class="error"> <?php echo $nameErr; ?></span><br><br>
				<label for="email">email:</label>
				<input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Doe@gmail.com">
				<span class="error"> <?php echo $emailErr; ?></span><br><br>
				<label for="phonenumber">Phonenumber:</label>
				<input type="tel" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>" placeholder="0612345678">
				<span class="error"> <?php echo $phonenumberErr; ?></span><br><br>
			</div>

			<div class="communication">
				<br>
				<label for="communication"> Prefered communication:</label>
				<span class="error"> <?php echo $communicationErr; ?></span><br>
				<input type="radio" id="email2" name="communication" <?php if (isset($communication) && $communication == "email") echo "checked"; ?> value="email">
				<label for="email2">Email</label><br>
				<input type="radio" id="phone" name="communication" <?php if (isset($communication) && $communication == "phone") echo "checked"; ?> value="phone">
				<label for="phone">Phone</label><br>
				<br>
			</div>


			<div class="input">
				<label for="input"> Input field: </label>
				<textarea name="input" rows="8" cols="30" placeholder="Vul hier overige informatie die van belang is in."><?php echo $input; ?></textarea> <br>
				<br>
			</div>


			<div>
				<input type="submit" value="Submit">
			</div>


		</form>

	<?php } else { ?>

		<p class="thanks"> Bedankt voor het invullen van het contactformulier. </p>
		<br>
		<h3> Jouw gegevens:</h3>
		<?php echo $preamble;
		echo "<br>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $communication;
		echo "<br>";
		echo $phonenumber;
		echo "<br>";
		echo $input;
		?>

	<?php } ?>

</body>

<footer>
	<h2> &copy;, 2022, Kevin Slieker </h2>
</footer>


</html>