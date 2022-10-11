<?php

function authenicateUser($email, $password) {
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
        return NULL;
    }

}

function storeUser($email,$name,$password){
    $user = saveUser($email,$name,$password);
    return $user;
}

?>
