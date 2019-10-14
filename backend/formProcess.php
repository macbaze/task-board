<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (count($_POST) > 0)) {
  include('task.php');
  include('auth.php');
  $args = array(
    'username'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'email'      => FILTER_SANITIZE_EMAIL,
    'text' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );

  if (isset($_POST['formName'])) {
    switch ($_POST['formName']) {
      case 'addTask':     //addForm processing
        $filteredPOST = filter_input_array(INPUT_POST, $args);
        addTask($filteredPOST['username'], $filteredPOST['email'], $filteredPOST['text']);
      break;
      case 'editTask':    //editForm processing
        if ($adminAccount) {
          if (isset($_POST['done'])) {
            $done = 1;
          } else {
            $done = 0;
          }
          if (isset($_POST['edited'])) {
            $edited = 1;
          } else {
            $edited = 0;
          }
          $filteredPOST = filter_input_array(INPUT_POST, $args);
          editTask($filteredPOST['username'], $filteredPOST['email'], $filteredPOST['text'], $done, $edited, $_POST['id']);
        } else {
          header('HTTP/1.0 403 Forbidden');
        }
    }
  }
} else {
  Header('Location: ../current.php');
}
?>