<?php
include('task.php');
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (count($_POST) > 0)) {
  $args = array(
    'username'   => FILTER_SANITIZE_SPECIAL_CHARS,
    'email'      => FILTER_SANITIZE_EMAIL,
    'text' => FILTER_SANITIZE_SPECIAL_CHARS
  );
  $filteredPOST = filter_input_array(INPUT_POST, $args);
  addTask($filteredPOST['username'], $filteredPOST['email'], $filteredPOST['text']);
} else {
  Header('Location: ../current.php');
}
?>