<?php
  $log = $_COOKIE['login'];
  $pass = $_COOKIE['password'];
  if (($log == "Admin") && ($pass == "123456")) echo "������������, �������������!";
  else echo "������ ������!";
?>