<?php

function showRegisterHead(){
    echo "Register";
}

function showRegisterHeader() {
    echo "Register";
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