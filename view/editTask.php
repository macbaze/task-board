<?php
$pageTitle = 'Редактирование задачи';
include('parts/pageHeader.php');
include('parts/menu.php');
?>
<form class="needs-validation mx-auto" name="editTask" novalidate>
  <input type="text" name="id" value="<?=$task->id?>" hidden>
  <div class="form-group">
    <label for="uname">Имя пользователя</label>
    <input type="text" class="form-control" id="uname" placeholder="Введите имя пользователя" name="username" required value="<?=$task->user?>">
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <div class="form-group">
    <label for="email">E-Mail</label>
    <input type="email" class="form-control" id="email" placeholder="Введите E-Mail" name="email" required value="<?=$task->email?>">
    <div class="invalid-feedback">Должен быть указан правильный E-Mail</div>
  </div>
  <div class="form-group">
    <label for="textarea">Текст задачи</label>
    <textarea class="form-control" id="textarea" rows="3" placeholder="Введите текст задачи" name="text" required><?=$task->text?></textarea>
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="done" name="done"<?=($task->done == 1)?' checked':'';?>>
    <label class="form-check-label" for="done">Отметка о выполнении</label>
  </div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
<script src="js/formValidation.js"></script>
<script src="js/editTaskFormPOST.js"></script>
<?php
include('parts/pageFooter.php');
?>