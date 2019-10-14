<?php
include('backend/auth.php');
if ($adminAccount && isset($_GET['id'])) {
  $options = array(
    'options' => array(
        'min_range' => 1
    )
  );
  if ($id = filter_var($_GET['id'], FILTER_VALIDATE_INT, $options)) {
    include('backend/task.php');
    if($task = getOneTask($id)) {
      include('view/editTask.php');
      exit; //prevent redirect
    }
  }
}
header("Location: current.php"); //will redirect only if there are problems
?>