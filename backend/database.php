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

  public function queryTasks($DBoffset, $DBsortField, $DBsortDirection) {
    $temp_rows = array();

    $sql = "SELECT * FROM tasks ORDER BY $DBsortField $DBsortDirection LIMIT $DBoffset, 3";
    if (!$result = $this->mysqli->query($sql)) {
        echo "Запрос: " . $sql . "\n";
        echo "Номер ошибки: " . $this->mysqli->errno . "\n";
        echo "Ошибка: " . $this->mysqli->error . "\n";
        exit;
    }
    if ($result->num_rows === 0) {
      echo "Пустая выборка";
      exit;
    }
    while ($row = $result->fetch_assoc()) {
      $temp_rows[] = $row;
    }
    return $temp_rows;
  }

  public function countTasks() {
    $temp_number = 0;

    $sql = "SELECT COUNT(*) as cnt FROM tasks";
    if (!$result = $this->mysqli->query($sql)) {
        echo "Запрос: " . $sql . "\n";
        echo "Номер ошибки: " . $this->mysqli->errno . "\n";
        echo "Ошибка: " . $this->mysqli->error . "\n";
        exit;
    }
    if ($result->num_rows === 0) {
      echo "Пустая выборка";
      exit;
    }
    if ($row = $result->fetch_assoc()) {
      $temp_number = $row['cnt'];
    }
    return $temp_number;
  }
}
?>