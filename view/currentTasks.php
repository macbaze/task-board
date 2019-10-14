<?php
$pageTitle = 'Текущие задачи';
include('parts/pageHeader.php');
include('parts/menu.php');
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">Имя пользователя</span>
          <button class="sort-toggle text-light<?=(($sortField == 'username') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="username" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle text-light<?=(($sortField == 'username') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="username" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">E-Mail</span>
          <button class="sort-toggle text-light<?=(($sortField == 'email') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="email" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle text-light<?=(($sortField == 'email') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="email" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
      <th scope="col" class="w-40">
        <div class="d-flex">
          <span class="d-inline-block text-truncate">Текст задачи</span></th>
        </div>
      <th scope="col" class="w-20">
        <div class="d-flex">
          <span class="d-inline-block text-truncate mr-auto">Статус</span>
          <button class="sort-toggle text-light<?=(($sortField == 'done') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="done" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
          <button class="sort-toggle text-light<?=(($sortField == 'done') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="done" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($tasks as $task):
  $doneBadgeHTML = '';
  $editedBadgeHTML = ''; 
  if($task->done) {
    $doneBadgeHTML = '<span class="badge badge-success">выполнено</span>';
  }
  if($task->edited) {
    $editedBadgeHTML = '<span class="badge badge-warning">отредактировано<br>администратором</span>';
  }
  ?>
    <tr>
      <td scope="row"><?=$task->user;?></td>
      <td><?=$task->email;?></td>
      <td><?=$task->text;?></td>
      <td class="d-flex flex-column"><?=$doneBadgeHTML?><?=$editedBadgeHTML?></td>
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