<?php
function doLoginUser($name) {

    $_SESSION['login'] = $name;
 
 }
 
 function isUserLoggedIn() {
    return isset($_SESSION['login']);
 
 }
 
 function getLoggedInUserName() {
     return $_SESSION['login'];
 
 }
 
 function doLogoutUser() {
    unset($_SESSION['login']);
 }
?>