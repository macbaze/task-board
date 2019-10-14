<?php
$pageTitle = 'Вход администратора';
include('parts/pageHeader.php');
include('parts/menu.php');
if ($loginFailed) :
?>
  <div class="alert alert-danger">
    <strong>Ошибка!</strong> Введённые данные неверны
  </div>
<?php endif;?>
<form class="needs-validation mx-auto" method="POST" action="login.php" name="loginForm"  novalidate>
  <div class="form-group">
    <label for="login">Имя пользоваетля</label>
    <input type="text" class="form-control" id="login" name="login" required>
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <div class="form-group">
    <label for="pwd">Пароль</label>
    <input type="password" class="form-control" id="pwd" name="password" required>
    <div class="invalid-feedback">Поле должно быть заполнено</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="js/formValidation.js"></script>
<?php
include('parts/pageFooter.php');
?>