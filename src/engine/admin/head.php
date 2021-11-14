<?php session_start(); ?>
<?php if ($_SESSION['user_group'] != 1) {
    die('Нет доступа.');
} ?>
<?php require_once('config.php'); ?>
<?php require_once('ajax.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Админка</title>
    <link href="/css/admin/admin.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/js/libs/jquery.min.js"></script>
</head>