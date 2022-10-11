<?php

function findUserByEmail($mail){
	$file = fopen('users/users.txt', 'r');
	$user = NULL;
	$line = fgets($file);

    while (!feof($file)) {
        $line = fgets($file);
        $explode = explode('|', $line);
        if ($explode [0] == "$email"); {
            $user = ($explode [0] == "$email", $explode [1] == "$name", $explode [2] == "$password");
        }
    }
    fclose($file);
    return $user;

}


function saveUser($email,$name,$passwordd) {
    $file = $file = fopen('users/users.txt', 'a');
    $newuser = $email . '|' . $name . '|' . $password;
    fwrite($file, $newuser);
    fclose($file);
}

?>
