<?php
  $log = $_COOKIE['login'];
  $pass = $_COOKIE['password'];
  if (($log == "Admin") && ($pass == "123456")) echo "Здравствуйте, Администратор!";
  else echo "Доступ закрыт!";
?>