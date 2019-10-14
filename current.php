<?php
include('backend/auth.php');

if (isset($_GET['s_field']) && $_GET['s_field']!="") {
  $sortField = $_GET['s_field'];
} else {
  $sortField = 'id';
}
if (isset($_GET['s_dir']) && $_GET['s_dir']!="") {
  $sortDirection = $_GET['s_dir'];
} else {
  $sortDirection = 'DESC';
}
if (isset($_GET['page']) && $_GET['page']!="") {
  $page = $_GET['page'];
} else {
  $page = 1;
}                           //debug. filter vars before mysql query

include('backend/task.php');
$tasksCount = 0;
$tasks = getTasks($page, $sortField, $sortDirection, $tasksCount);

include('view/currentTasks.php');
?>