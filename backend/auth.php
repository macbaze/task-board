<?php
//couldn't make myself to do database authentification for 1 user. here is simplified version
function checkAuth($login, $passwordHash) {
  if ($login == 'admin') {
    if ($passwordHash == '6bc8fc6fd0d3e11b5c3361b6b9a1365b85adf6d3515ae3b020237001cc036c15') { // "1s321s123" with sha-256 ("123" with salt)
      return true;
    } else {
      //wrong pass
    }
    //wrong user
  }
  return false;
}

function checkSession() { //check if user is logged in as admin
  if (isset($_SESSION['admHash']) && ($_SESSION['admHash'] == substr('6bc8fc6fd0d3e11b5c3361b6b9a1365b85adf6d3515ae3b020237001cc036c15',2))) {
    return true;
  }
  return false;
}

function logout() {
  if (isset($_SESSION['admHash'])) {
    session_unset();
    session_destroy();
  }
  header("Location: current.php");
}

// initialize session and set $adminAccount variable
session_start();
$adminAccount = checkSession(); //admin flag
?>