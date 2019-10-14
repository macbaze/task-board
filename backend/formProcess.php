<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (count($_POST) > 0)) {
  include('task.php');
  include('auth.php');
  $args = array(
    'username'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'email'      => FILTER_SANITIZE_EMAIL,
    'text' => FILTER_SANITIZE_FULL_SPECIAL_CHARS //filtered that way because of newlines and html tags in textfield: should be displayed as is
  );

  if (isset($_POST['formName'])) { 
    switch ($_POST['formName']) { //two forms data switch/ shold be 'login' form too, but i'm too tired to rewrite it
      case 'addTask':     //addForm processing
        $filteredPOST = filter_input_array(INPUT_POST, $args);
        addTask($filteredPOST['username'], $filteredPOST['email'], $filteredPOST['text']);
      break;
      case 'editTask':    //editForm processing
        if ($adminAccount) {
          if (isset($_POST['done'])) { //checkbox is included in POST only when checked
            $done = 1;
          } else {
            $done = 0;
          }
          if (isset($_POST['edited'])) { //included in POST with js only when textarea was edited
            $edited = 1;
          } else {
            $edited = 0;
          }
          $filteredPOST = filter_input_array(INPUT_POST, $args);
          editTask($filteredPOST['username'], $filteredPOST['email'], $filteredPOST['text'], $done, $edited, $_POST['id']);
        } else {
          header('HTTP/1.0 403 Forbidden'); //will appear if admin logged out before ajax send
        }
    }
  }
} else {
  Header('Location: ../current.php'); //nothing to do here without POST data
}
?>