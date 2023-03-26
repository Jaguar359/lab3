<?php

/**
 * Пост
 */
class Post
{
    public $mysql;
    public $author;
    public $comment;
    public $datetime;

    /**
     * Сохранение в БД
     *
     * @param $mysql
     * @param $author
     * @param $comment
     * @param $datetime
     *
     * @return bool
     */
    public function save()
    {
        $this->mysql->query("INSERT INTO posts (id, author, message, datetime)
        VALUES (null, '{$this->author}', '{$this->comment}', '{$this->datetime}')");

        return true;
    }
}