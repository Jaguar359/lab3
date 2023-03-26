<?php

// подключаемся к бд
$mysql = new mysqli('localhost', 'root', 'Bacs1906', 'lab3');
$mysql->set_charset("utf8mb4");

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // подготавливаем переменные
    $author   = $_POST["author"];
    $comment  = $_POST["comment"];
    $datetime = time();

    // сохраняем в базу
    $mysql->query("INSERT INTO posts (id, author, message, datetime)
    VALUES (null, '{$author}', '{$comment}', '{$datetime}')");

    header("Location: index.php");
}
?>
<html>
<head>
    <style>
        input {
            border: 1px solid #000000;
            width: 100%;
            padding: 10px;
        }

        textarea {
            border: 1px solid #000000;
            width: 100%;
            padding: 10px;
        }

        .container {
            width: 50%;
            margin: 20vh auto;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    // отправляем запрос в базу (выбрать все из таблицы posts)
    $result = $mysql->query("SELECT * FROM posts");

    // если кол-во записей > 0 - выводим их
    if ($result->num_rows > 0) {
        // output data of each row

        // пока в переменной $row есть данные
        while ($row = $result->fetch_assoc()) {
            // выводим что-то на экран
            echo "<b>{$row['author']}</b><br>";
            echo "{$row['message']}<hr>";
        }
    } else { // или
        // пишем, что пусто
        echo "0 results";
    }
    $mysql->close();
    ?>

    <form action="index.php" method="POST" style="margin-top: 25px">
        <input type="text" name="author" placeholder="Автор">
        <br><br>
        <textarea name="comment" placeholder="Ваше сообщение"></textarea>
        <br><br>
        <input type="submit" value="Отправить" style="background-color: lightslategrey">
    </form>
</div>
</body>
</html>