<?php

require_once('session_manager.php');


function showLoginHead(){
    echo "Login";
}

function showLoginHeader() {
    echo "Login";
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