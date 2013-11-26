<?php
require_once __DIR__.'/../../common/BaseController.php';
require_once __DIR__.'/../models/PostModel.php';
use \core\common\BaseController;
use \core\site\models\PostModel;

class PostController extends BaseController
{
    public function actionIndex()
    {
        $model = new PostModel();
        $model->getListOfPosts();
        echo 'zzzzzzzzzzzzzzzz';
    }

    public function getUrl($controller, $action)
    {
    }

    public function getViewBasePath()
    {

    }
}
