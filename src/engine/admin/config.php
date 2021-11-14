<?php

  $link = new PDO('mysql:dbname=shop;host=localhost;charset=UTF8', 'deruino', 'UspeX1337');

  if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
  }
  
?>