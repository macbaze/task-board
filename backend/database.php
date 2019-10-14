<?php
class tasksDB {
  private $mysqli;

  public function __construct() {
    $this->mysqli = new mysqli('127.0.0.1', 'taskBoard', 'task123', 'task-board');
    if ($this->mysqli->connect_errno) {
      echo "Ошибка: Не удалась создать соединение с базой MySQL (" . $this->mysqli->connect_errno . " - " . $this->mysqli->connect_error . ")\n";
      exit;
    }
  }

  private function showErrorInfo($sql) {
    echo "Запрос: " . $sql . "\n";
    echo "Номер ошибки: " . $this->mysqli->errno . "\n";
    echo "Ошибка: " . $this->mysqli->error . "\n";
    exit;
  }

  public function queryTasks($DBoffset, $DBsortField, $DBsortDirection) {
    $temp_rows = array();

    $sql = "SELECT * FROM tasks ORDER BY $DBsortField $DBsortDirection LIMIT $DBoffset, 3";
    if (!$result = $this->mysqli->query($sql)) {
      $this->showErrorInfo($sql);
    }
    while ($row = $result->fetch_assoc()) {
      $temp_rows[] = $row;
    }
    return $temp_rows;
  }

  public function queryOneTask($id) {
    $sql = "SELECT * FROM tasks WHERE id='$id' LIMIT 1";
    if (!$result = $this->mysqli->query($sql)) {
      $this->showErrorInfo($sql);
    }
    if ($row = $result->fetch_assoc()) {
      return $row;
    }
    return false;
  }

  public function countTasks() {
    $temp_number = 0;

    $sql = "SELECT COUNT(*) as cnt FROM tasks";
    if (!$result = $this->mysqli->query($sql)) {
      $this->showErrorInfo($sql);
    }
    if ($row = $result->fetch_assoc()) {
      $temp_number = $row['cnt'];
    }   //if else $temp_number will be '0'

    return $temp_number;
  }

  public function insertTask($taskObj) {
    $sql = "INSERT INTO tasks (username, email, description)
      VALUES ('{$taskObj->user}', '{$taskObj->email}', '{$taskObj->text}')";

    if (!$this->mysqli->query($sql)) {
      $this->showErrorInfo($sql);
    }
  }

  public function editTask($taskObj) {
    $sql = "UPDATE tasks SET username='{$taskObj->user}', email='{$taskObj->email}', description='{$taskObj->text}', done='{$taskObj->done}', edited='{$taskObj->edited}' WHERE id='{$taskObj->id}'";
    if (!$this->mysqli->query($sql)) {
      $this->showErrorInfo($sql);
    }
  }
}
?>