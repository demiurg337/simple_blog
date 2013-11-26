<?php
namespace core\admin\models;
require_once __DIR__.'/../../common/BaseModel.php';
use \core\common\BaseModel;

class PostModel extends BaseModel
{
    public function getListPosts()
    {
        $st = self::getConnection()->prepare('SELECT * from posts');
        $st->execute();
        return $st->fetchAll(\PDO::FETCH_CLASS);
    }

    public function savePost($title, $content, $teaser)
    {
        $st = self::getConnection()->prepare(
                'INSERT INTO posts 
                (title, content, teaser) 
                VALUES 
                (:title, :content, :teaser)');
            
        $st->bindValue(':title', $title, \PDO::PARAM_STR);
        $st->bindValue(':content', $content, \PDO::PARAM_STR);
        $st->bindValue(':teaser', $teaser, \PDO::PARAM_STR);

        return $st->execute();
    }
}
