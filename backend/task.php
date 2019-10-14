<?php
include('database.php');

class Task
{
  public $id;
  public $user;
  public $email;
  public $text;
  public $done;
  public $edited;

  public function __construct($user, $email, $text, $done = 0, $edited = 0, $id=0) {
    $this->id = $id;
    $this->user = $user;
    $this->email = $email;
    $this->text = $text;
    $this->done = $done;
    $this->edited = $edited;
  }
}

function getTasks($page, $sField, $sDirection, &$tasksCountPtr) {
  if($page>1){
    $offset = ($page - 1) * 3;
  } else {
    $offset = 0;
  }
  $temp_tasks = array();
  $DBconnection = new tasksDB();
  $task_rows = $DBconnection->queryTasks($offset, $sField, $sDirection);
  $tasksCountPtr = $DBconnection->countTasks();
  foreach ($task_rows as $row) {
    $temp_tasks[] = new Task($row['username'], $row['email'], $row['description'], $row['done'], $row['edited'], $row['id']);
  }
  return $temp_tasks;
}

function getOneTask($id) {
  $DBconnection = new tasksDB();
  if($task_row = $DBconnection->queryOneTask($id)) {
    $taskObj = new Task($task_row['username'], $task_row['email'], $task_row['description'], $task_row['done'], $task_row['edited'], $task_row['id']);
    return $taskObj;
  }
  return false;
}

function addTask($user, $email, $text) {
  $temp_task = new Task($user, $email, $text);
  $DBconnection = new tasksDB();
  $DBconnection->insertTask($temp_task);
}

function editTask($user, $email, $text, $done, $edited, $id) {
  $temp_task = new Task($user, $email, $text, $done, $edited, $id);
  $DBconnection = new tasksDB();
  $DBconnection->editTask($temp_task);
}
?>