<?php
require_once("file_repository.php");

function authenticateUser($email, $password) {
	$user = findUserByEmail($email);
    if (empty($user)) { 
         return NULL;
    }
    if ($user['password'] != $password) {
        return null;
    }
    return $user;
}




function doesEmailExist($email){
    $user = findUserByEmail($email);
    if (empty($user)) {
        return FALSE;
    } else {
    return TRUE;
    }
}

function storeUser($email,$name,$password){
    saveUser($email,$name,$password);
}

?>
