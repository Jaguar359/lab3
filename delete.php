<?php

// если передан параметр id
if (isset($_GET['id'])){
    // подключаем настройки бд
    include 'includes/db.inc.php';

    // чистим переменную от возможного мусора
    $id = htmlspecialchars($_GET['id']);

    // выолняем запрос на удаление строки по id
    $mysql->query("DELETE FROM posts WHERE id = {$id}");

    // редиректим обратно
    header("Location index.php");
}