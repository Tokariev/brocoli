<?php
  require "db.php";
?>
 <?php if( isset($_SESSION['logged_user'])) : ?>
     Авторизованый!<br>
     <hr>
     <a href="/logout.php">Выйти</a>
 <?php else : ?>
     <a href="/login.php">Войти</a>
     <a href="/signup.php">Регистрация</a>
 <?php endif; ?>


