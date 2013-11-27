<?php 
namespace core\site\models;
require_once __DIR__.'/../../common/BaseModel.php';

use \core\common\BaseModel;

class PostModel extends BaseModel
{
    public function getListOfPosts()
    {
        $st = self::getConnection()->prepare(
            'SELECT id, teaser, count_comments, title FROM posts'
        );

        $st->execute();
        return $st->fetchAll(\PDO::FETCH_CLASS);
    }
}
