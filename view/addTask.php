<?php
$pageTitle = 'Добавление задачи';
include('parts/pageHeader.php');
include('parts/menu.php');
?>
<form class="needs-validation mx-auto" method="POST" name="addTask" novalidate>
  <div class="form-group">
    <label for="uname">Имя пользователя</label>
    <input type="text" class="form-control" id="uname" placeholder="Введите имя пользователя" name="username" required>
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <div class="form-group">
    <label for="email">E-Mail</label>
    <input type="email" class="form-control" id="email" placeholder="Введите E-Mail" name="email" required>
    <div class="invalid-feedback">Должен быть указан правильный E-Mail</div>
  </div>
  <div class="form-group">
    <label for="textarea">Текст задачи</label>
    <textarea class="form-control" id="textarea" rows="3" placeholder="Введите текст задачи" name="text" required></textarea>
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
<script src="js/formValidation.js"></script>
<script src="js/newTaskFormPOST.js"></script>
<?php
include('parts/pageFooter.php');
?>