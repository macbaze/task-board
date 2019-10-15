<?php
include('backend/auth.php');

$possibleFieldValues = array('username', 'email', 'done');
if (isset($_GET['s_field']) && in_array($_GET['s_field'], $possibleFieldValues)) {
  $sortField = $_GET['s_field'];
} else {
  $sortField = 'id';
}

$possibleDirValues = array('ASC', 'DESC');
if (isset($_GET['s_dir']) && in_array($_GET['s_dir'], $possibleDirValues)) {
  $sortDirection = $_GET['s_dir'];
} else {
  $sortDirection = 'DESC';
}

if (isset($_GET['page']) && is_numeric($_GET['page']) && intval($_GET['page']>0)) {
  $page = intval($_GET['page']); //if page number is too big - result table will be empty
} else {
  $page = 1;
}

include('backend/task.php');
$tasksCount = 0;
$tasks = getTasks($page, $sortField, $sortDirection, $tasksCount);

include('view/currentTasks.php');
?>