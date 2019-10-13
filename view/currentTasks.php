<?php
$pageTitle = 'Текущие задачи';
include('parts/pageHeader.php');
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="w-20">
        Статус
        <button class="sort-toggle text-light<?=(($sortField == 'done') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="done" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
        <button class="sort-toggle text-light<?=(($sortField == 'done') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="done" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
      </th>
      <th scope="col" class="w-20">
        Имя пользователя
        <button class="sort-toggle text-light<?=(($sortField == 'username') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="username" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
        <button class="sort-toggle text-light<?=(($sortField == 'username') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="username" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
      </th>
      <th scope="col" class="w-20">
        E-Mail
        <button class="sort-toggle text-light<?=(($sortField == 'email') && ($sortDirection == 'ASC')) ? ' active' : '';?>" field="email" direction="ASC" onclick="changeSorting(this)">&#x2191;</button>
        <button class="sort-toggle text-light<?=(($sortField == 'email') && ($sortDirection == 'DESC')) ? ' active' : '';?>" field="email" direction="DESC" onclick="changeSorting(this)">&#x2193;</button>
      </th>
      <th scope="col" class="w-40">Текст задачи</th>
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
      <th scope="row" class="d-flex flex-column"><?=$doneBadgeHTML?><?=$editedBadgeHTML?></th>
      <td><?=$task->user;?></td>
      <td><?=$task->email;?></td>
      <td><?=$task->text;?></td>
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