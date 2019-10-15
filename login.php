<?php
include('backend/auth.php');

if ($adminAccount) { // if already logged in - redirect
  header("Location: current.php");
}

if (isset($_GET['logout'])) {
  logout();
}

$loginFailed = false; //flag for login failure notification
if (isset($_POST['login']) && isset($_POST['password'])){
  $temp_pass = trim($_POST['password']); //not shure about password field special chars filtering. i think it's safe enough to use password input this way
  $salt = 's'.strrev($temp_pass).'s';
  $passwordHash = hash('sha256',substr($temp_pass, 0, 1).$salt.substr($temp_pass, 1));  //pass with salt
  $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
  
  if (checkAuth($login, $passwordHash)) {
    $_SESSION['admHash'] = substr($passwordHash, 2);
    header("Location: current.php");
  } else {
    $loginFailed = true;
  }
}

include('view/login.php');
?>