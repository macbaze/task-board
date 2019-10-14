<?php
$pageTitle = 'Текущие задачи';
include('parts/pageHeader.php');
include('parts/menu.php');
?>
<table class="table<?=($adminAccount)?' table-hover':'';?>">
  <thead class="thead-light">
    <tr>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">Имя пользователя</span>
          <button class="sort-toggle<?=(($sortField == 'username') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="username" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle<?=(($sortField == 'username') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="username" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">E-Mail</span>
          <button class="sort-toggle<?=(($sortField == 'email') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="email" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle<?=(($sortField == 'email') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="email" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
      <th scope="col" class="w-40">
        <div class="d-flex">
          <span class="d-inline-block text-truncate">Текст задачи</span></th>
        </div>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">Статус</span>
          <button class="sort-toggle<?=(($sortField == 'done') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="done" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle<?=(($sortField == 'done') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="done" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($tasks as $task) :?>
    <tr>
      <td scope="row"><?=$task->user;?></td>
      <td><?=$task->email;?></td>
      <td><?=$task->text;?></td>
      <td>
        <div class="d-flex flex-wrap">
          <?php
          if ($adminAccount) {
            echo "<a class=\"badge badge-info m-1 mb-auto\" href=\"edit.php?id=$task->id\">&#x270E;</a>";
          }
          if($task->done) {
            echo '<span class="badge badge-success m-1 mb-auto">выполнено</span>';
          }
          if($task->edited) {
            echo '<span class="badge badge-warning m-1">отредактировано<br>администратором</span>';
          }
          ?>
        </div>
      </td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
<?php
  if($tasksCount > 3) {
    include('view/parts/pagination.php');
}
include('parts/pageFooter.php');
?>