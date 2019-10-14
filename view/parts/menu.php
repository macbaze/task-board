<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="nav justify-content-end">
  <?php if ($currentPage != "current.php") :?>
    <a class="nav-item nav-link" href="current.php">Все задачи</a>
  <?php endif;
  if ($currentPage != "add.php") :?>
    <a class="nav-item nav-link" href="add.php">Добавить задачу</a>
  <?php endif;
  if (($currentPage != "login.php") && (!$adminAccount)) :?>
    <a class="nav-item nav-link<?=($currentPage == "login.php")?' active':'';?>" href="login.php">Авторизация</a>
  <?php endif;
  if ($adminAccount) :?>
    <a class="nav-item nav-link" href="login.php?logout">Выход</a>
  <?php endif;?>
</nav>
<h2 class="text-center"><?=$pageTitle?></h2>