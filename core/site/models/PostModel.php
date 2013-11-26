<?php 
namespace core\site\models;
require_once __DIR__.'/../../common/BaseModel.php';

use \core\common\BaseModel;

class PostModel extends BaseModel
{
    public function getListOfPosts()
    {
        $st = self::getConnection()->prepare(
            'SELECT * FROM posts'
        );

        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_CLASS);
        print_r($res);
    }
}