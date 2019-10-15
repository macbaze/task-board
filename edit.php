<?php
include('backend/auth.php');
if ($adminAccount && isset($_GET['id']) && is_numeric($_GET['id'])) {
  if (intval($_GET['id'] > 0)) {
    include('backend/task.php');
    if($task = getOneTask(intval($_GET['id']))) {
      include('view/editTask.php');
      exit; //prevent redirect
    }
  }
}
header("Location: current.php"); //will redirect only if there are problems
?>