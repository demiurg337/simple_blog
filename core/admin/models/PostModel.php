<?php

class PostModel 
{
    protected static $pdoConnection = null;

    public function __construct()
    {
    }

    public static function getConnection()
    {
        if (null === self::$pdoConnection) {
            self::$pdoConnection = new PDO('mysql:host=localhost;dbname=simple_blog', 'root', 'asd123456789');
        }

        return self::$pdoConnection;
    }

    public function getListPosts()
    {
        $st = self::getConnection()->prepare('SELECT * from posts');
        $st->execute();
        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function savePost($title, $content)
    {
        $c = new PDO('mysql:host=localhost;dbname=simple_blog', 'root', 'asd123456789');
        $st = $c->prepare(
                'INSERT INTO posts 
                (title, content) 
                VALUES 
                (:title, :content)');
            
        $st->bindValue(':title', $title, PDO::PARAM_STR);
        $st->bindValue(':content', $content, PDO::PARAM_STR);

        return $st->execute();
    }
}
